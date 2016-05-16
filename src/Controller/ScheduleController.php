<?php

namespace Controller;

use Entity\ScheduleEntity;

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
        $rooms = $this->getRepository('room');
        $movies = $movies->loadAll();
        $rooms = $rooms->loadAll();
        $data = ['movies' => array(), 'rooms' => array()];
        $data['movies'] = $this->tableObjectToArray($movies);
        $data['rooms'] = $this->tableObjectToArray($rooms);
        
        return $this->render('schedule', $data);
    }

    private function validateDate($date)
    {
        $current_date = strtotime(date('Y-m-d'));
        $max_schedule_date = strtotime(date('Y-m-d', strtotime('+6 months')));
        $scheduled_date = strtotime($date);
        var_dump($current_date);
        var_dump($scheduled_date);
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
            $schedules = $schedule_repository->loadByProperties(['time' => "{$time}:00", 'date' => $date]);
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

    private function validateSchedule($input)
    {
        $errors = '';
        foreach ($input as $field => $value) {
            if (empty($value)) {
                $errors .= "Please select a {$field}. ";
            } else {
                switch ($field) {
                    case 'date': $date_error = $this->validateDate($value);
                        break;
                    case 'room': $room_error = $this->validateRoomAndMovie($value, $input['movie'], $input['date'], $input['time']);
                        break;
                }
            }
        }
        if (isset($date_error) && $date_error !== true) {
            $errors .= $date_error;
        } else if (isset($room_error)) {
            $errors .= $room_error;
        }

        return $errors;
    }

    public function addSchedule()
    {
        $input_data = array(
            'movie' => $this->getPostParam('movie'),
            'date' => $this->getPostParam('date'),
            'time' => $this->getPostParam('time'),
            'room' => $this->getPostParam('room'),
            'price' => $this->getPostParam('price')
        );

        //validate input
        $errors = $this->validateSchedule($input_data);
        if (!empty($errors)) {
            $this->addErrorMessage($errors);
            return $this->showSchedule();
        }

        // construct schedule entity
        $rooms = $this->getRepository('room');
        try {
            $room = $rooms->loadByProperties(['id' => $input_data['room']]);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.');
            return $this->showSchedule();
        }

        $properties = array(
            'movieId' => (int) $input_data['movie'],
            'roomId' => (int) $input_data['room'],
            'date' => $input_data['date'],
            'time' => (int) $input_data['time'],
            'ticketPrice' => (float) $input_data['price'],
            'remainingSeats' => (int) $room[0]->getCapacity()
        );
        
        $schedule = $this->getEntity('schedule', $properties);      
        try {
            $schedule = $this->getEntity('schedule', $properties);
        } catch (\Exception $ex) {
            $this->addErrorMessage($ex->getMessage());
            return $this->showSchedule();
        }

        // save schedule in database
        $schedule_repository = $this->getRepository('schedule');
        try {
            $schedule_repository->save($schedule);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.');
            return $this->showSchedule();
        }

        $this->addSuccessMessage('Movie successfully scheduled');
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('show_profile');
        return $this->application->redirect($url);
    }


    public function getMoviesFromSchedule()
    {
        $schedule_repository = $this->getRepository('schedule');
        $movie_repository = $this->getRepository('movie');
        $movie_ids = $schedule_repository->groupByProperty('movie_id');
        $movies = [];
        foreach ($movie_ids as $key => $movie_id) {
            $movie = $movie_repository->loadByProperties(['id' => $movie_id]);
            if (!empty($movie)) {
                $movies [] = reset($movie);
            }
        }

        return $movies;
    }
    
    public function showScheduledMovies($page = 1, $moviesPerPage = 6) {
        $page = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $moviesPerPage = $this->getQueryParam('movies_per_page') == null ? $moviesPerPage : $this->getQueryParam('movies_per_page');
        $movies = $this->getMoviesFromSchedule();
        $context = [
            'movieList' => $movies,
        ];
        return $this->render('showscheduledmovies', $context);
    }

    public function listSchedules()
    {               
        $data = ['schedules' => []];
        $schedules = $this->getRepository('schedule');
        $dates = $schedules->groupByProperty('date');
        foreach ($dates as $key => $date) {
            $data['schedules'][] = $date;
        } 
       
        return $this->render('showschedules', $data);
    } 
    

    public function getDateSchedule()
    {
        $date_id = $this->getCustomParam('date_id');
        $schedules_repository = $this->getRepository('schedule');
        $movies = $this->getRepository('movie');
        $current_schedules = $schedules_repository->getScheduledMoviesForDate($date_id);
        foreach ($current_schedules as $key => $schedule) {
            $movie_id = $schedule['movie_id'];
            $movie = $movies->loadByProperties(['id' => $movie_id]);
            $movie = reset($movie);
            $current_schedules[$key]['movie'] = $movie->getTitle();
        }

        $data = array(
            'schedules' => $current_schedules
        );

        return $this->application->json($data);
    }
}
