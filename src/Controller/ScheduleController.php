<?php

namespace Controller;

use Entity\ScheduleEntity;
//use Framework\Validator\ScheduleValidator;
use Framework\Helper\Paginator;

class ScheduleController extends AbstractController
{

    private function tableObjectToArray($entries)
    {
        $array = [];
        foreach ($entries as $entry) {
            $array[] = $entry->toArray();
        }
        return $array;
    }

    public function showSchedule()
    {
        $movies = $this->getRepository('movie');
        $movies = $movies->loadAll();
        $data = ['movies' => array(), 'rooms' => array()];
        $data['movies'] = $this->tableObjectToArray($movies);
        $data['last_date'] = $this->request->get('date');
        $data['last_time'] = $this->request->get('time');
        $data['last_price'] = $this->request->get('price');
        $data['last_movie'] = $this->request->get('movie');
        $data['last_room'] = $this->request->get('room');

        return $this->render('schedule', $data);
    }

    private function validateDate($date)
    {
        $current_date = strtotime(date('Y-m-d'));
        $max_schedule_date = strtotime(date('Y-m-d', strtotime('+6 months')));
        $scheduled_date = strtotime($date);
        if ($scheduled_date <= $current_date) {
            return $error = 'Please select a date from future (unless you have a time machine that can take you back in ' . $date . '). ';
        }
        if ($scheduled_date >= $max_schedule_date) {
            return $error = 'You cannot schedule a movie more than 6 months from now. ';
        }

        return true;
    }

    private function validateRoomAndMovie($room, $movie, $date, $time)
    {
        $schedule_repository = $this->getRepository('schedule');
        try {
            $schedules = $schedule_repository->loadByProperties(['time' => $time, 'date' => $date]);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.');
            return $this->showSchedule();
        }

        foreach ($schedules as $schedule) {
            if ($movie == $schedule->getMovieId() && $room == $schedule->getRoomId()) {
                return $error = 'Movie is already scheduled with these dates. ';
            } else if ($room == $schedule->getRoomId()) {
                return $error = "Room {$room} is already booked. ";
            }
        }
    }

    private function validatePrice($price)
    {
        if (!is_numeric($price)) {
            return $error = "Please type a valid price";
        }
    }

    private function validateSchedule($input)
    {
        $errors = '';
        foreach ($input as $field => $value) {
            if (empty($value)) {
                $errors .= "Please select a {$field}. ";
            } else {
                switch ($field) {
                    case 'date':
                        $date_error = $this->validateDate($value);
                        break;
                    case 'room': $room_error = $this->validateRoomAndMovie($value, $input['movie'], $input['date'], $input['time']);
                        break;
                    case 'price': $price_error = $this->validatePrice($value);
                }
            }
        }
        if (isset($date_error) && $date_error !== true) {
            $errors .= $date_error;
        } else if (isset($room_error)) {
            $errors .= $room_error;
        }
        if (isset($price_error)) {
            $errors .= $price_error;
        }

        return $errors;
    }

    public function addSchedule()
    {
        $errorResponse = array();
        $errorResponse['type'] = 'error';
        $errorResponse['title'] = 'Error!';

        $successResponse = array();
        $successResponse['type'] = 'success';
        $successResponse['title'] = 'Added!';

        $input_data = array(
            'movie' => $this->getPostParam('movie'),
            'date' => $this->getPostParam('date'),
            'time' => $this->getPostParam('time'),
            'room' => $this->getPostParam('room'),
            'price' => $this->getPostParam('price')
        );

        $errors = $this->validateSchedule($input_data);
        if (!empty($errors)) {
            $errorResponse['message'] = $errors;
            return $this->application->json($errorResponse);
        }

        $rooms = $this->getRepository('room');
        try {
            $room = $rooms->loadByProperties(['id' => $input_data['room']]);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.';
            return $this->application->json($errorResponse);
        }

        $properties = array(
            'movieId' => (int) $input_data['movie'],
            'roomId' => (int) $input_data['room'],
            'date' => $input_data['date'],
            'time' => $input_data['time'],
            'ticketPrice' => floatval($input_data['price']),
            'remainingSeats' => (int) $room[0]->getCapacity()
        );

        $time = explode(':', $properties['time']);
        $properties['time'] = (int) $time[0];

        try {
            $schedule = $this->getEntity('schedule', $properties);
        } catch (\Exception $ex) {
            $errorResponse['message'] = $ex->getMessage();
            return $this->application->json($errorResponse);
        }

        $schedule_repository = $this->getRepository('schedule');
        try {
            $schedule_repository->save($schedule);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.';
            return $this->application->json($errorResponse);
        }

        $successResponse['message'] = 'Movie successfully scheduled';
        return $this->application->json($successResponse);
    }

    public function getMoviesFromSchedule()
    {
        $schedule_repository = $this->getRepository('schedule');
        $movie_repository = $this->getRepository('movie');
        $schedules = $schedule_repository->groupByProperty('movie_id');
        $movies = [];
        foreach ($schedules as $key => $schedule) {
            $movie = $movie_repository->loadByProperties(['id' => $schedule->getMovieId()]);
            if (!empty($movie)) {
                $movies [] = reset($movie);
            }
        }

        return $movies;
    }

    /**
     * Shows all scheduled movies.
     * 
     * @return html template
     */
    public function showScheduledMovies()
    {
        
          try {
            $movieRepository = $this->getRepository('movie');
            $totalMovies = $movieRepository->getRowsCount();

            $currentPage = $this->getQueryParam('page');
            $moviesPerPage = $this->getQueryParam('movies_per_page');

            $paginator = new Paginator($currentPage, $totalMovies, $moviesPerPage);
            
            $movieList = $movieRepository->loadPage($paginator->getCurrentPage(), $paginator->getResultsPerPage());

            $context = [
                'paginator' => $paginator,
                'movieList' => $movieList
            ];
            return $this->render('showscheduledmovies', $context);
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('showscheduledmovies', $context);
        }
        
        
    }
    
    public function listSchedules()
    {
        $data = ['dates' => []];
        $schedule_repository = $this->getRepository('schedule');
        $schedules = $schedule_repository->groupByProperty('date');
        foreach ($schedules as $key => $schedule) {
            $data['dates'][] = $schedule->getDate()->format('Y-m-d');
        }

        return $this->render('showschedules', $data);       
    }

//    
//      public function showSchedulesPaginated()
//    {
//        try {
//            $schedule_repository = $this->getRepository('schedule');
//            $total_schedules = $schedule_repository->getRowsCount();
//            $current_page = $this->getQueryParam('page');
//            $schedules_per_page = $this->getQueryParam('schedules_per_page');
//            $paginator = new Paginator($current_page, $total_schedules, $schedules_per_page);
//                     
//            $data = [
//                'paginator' => $paginator,               
//                'dates' => $this->listSchedules()
//            ];            
//            
//            return $this->render('showschedules', $data);
//        } catch (Exception $ex) {
//            $this->addErrorMessage('Something went wrong!');
//            return $this->render('showschedules', $data);
//        }
//    }
    
    private function sortSchedulesByTime($schedules_array)
    {
        $time_row = [];
        $movie_row = [];
        foreach ($schedules_array as $key => $value) {
            $time_row[] = $schedules_array[$key]['time'];
            $movie_row[] = $schedules_array[$key]['movie'];
            $room_row[] = $schedules_array[$key]['room'];
        }
        array_multisort($time_row, SORT_ASC, $movie_row, SORT_ASC, $room_row, SORT_ASC, $schedules_array);

        return $schedules_array;
    }

    private function setTimeFormatDisplay($schedules_array, $format)
    {
        $format = explode(':', $format);
        foreach ($schedules_array as $key => $value) {
            $time = explode(':', $schedules_array[$key]['time']);
            $display_time = '';
            foreach ($format as $format_key => $format_value) {
                if (empty($display_time)) {
                    $display_time = $time[$format_key];
                } else {
                    $display_time .= ':' . $time[$format_key];
                }
            }
            $schedules_array[$key]['time'] = $display_time;
        }

        return $schedules_array;
    }

    public function getDateSchedule()
    {
        $date = $this->getCustomParam('date');        
        $schedules_repository = $this->getRepository('schedule');
        $movies_repository = $this->getRepository('movie');
        $rooms_repository = $this->getRepository('room');
        $current_schedules = $schedules_repository->loadByProperties(['date' => $date]);
        $results = array();
        foreach ($current_schedules as $key => $schedule) {
            $movie = $movies_repository->loadByProperties(['id' => $schedule->getMovieId()]);
            $room = $rooms_repository->loadByProperties(['id' => $schedule->getRoomId()]);
            $movie = reset($movie);
            $room = reset($room);
            $results[$key]['movie'] = $movie->getTitle();
            $results[$key]['time'] = $schedule->getTime();
            $results[$key]['room'] = $room->getName();
            $results[$key]['id'] = $schedule->getId();            
        }
        $results = $this->sortSchedulesByTime($results);
        $results = $this->setTimeFormatDisplay($results, 'H:i');         
        
        $data = array(
            'schedules' => $results
        );
   
        return $this->application->json($data);
    }

    public function getAvailableRooms()
    {
        $schedule_repository = $this->getRepository('schedule');
        $time = $this->getCustomParam('time');
        $date = $this->getCustomParam('date');
        $rooms = $schedule_repository->getAvailableRooms($date, $time);
        $rooms = $this->tableObjectToArray($rooms);
        $data = array('rooms' => $rooms);
        return $this->application->json($data);
    }

    public function deleteSchedule()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        $schedule_id = $this->getCustomParam('id');
        $schedule_repository = $this->getRepository('schedule');
        $schedule = $schedule_repository->loadByProperties(['id' => $schedule_id]);

        if (empty($schedule)) {
            $errorResponse['message'] = 'Could not delete schedule!';
            return $this->application->json($errorResponse);
        }

        $schedule = reset($schedule);
        try {
            $schedule_repository->delete($schedule);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Could not delete schedule!';
            return $this->application->json($errorResponse);
        }

        $successResponse = array();
        $successResponse['type'] = 'success';
        $successResponse['title'] = 'Deleted!';
        $successResponse['message'] = 'Schedule was successfully deleted!';
        return $this->application->json($successResponse);
    }

}
