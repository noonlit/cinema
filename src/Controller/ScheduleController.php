<?php

namespace Controller;

use Framework\Helper\Paginator;

class ScheduleController extends AbstractController
{

    /**
     * Renders the view for the add schedule functionality
     *
     * @return string
     */
    public function viewAddScheduleForm()
    {
        $movieRepository = $this->getRepository('movie');
        $data = ['movies' => array(), 'rooms' => array()];
        try {
            $data['movies'] = $movieRepository->loadAll();
        } catch (\Exception $ex) {
            $errorResponse['message']
                = 'We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.';

            return $this->render('schedule', $data);
        }

        $data['last_date'] = $this->request->get('date');
        $data['last_time'] = $this->request->get('time');
        $data['last_price'] = $this->request->get('price');
        $data['last_movie'] = $this->request->get('movie');
        $data['last_room'] = $this->request->get('room');

        return $this->render('schedule', $data);
    }

    /**
     * Renders the available rooms for a selected movie and date
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAvailableRooms()
    {
        $scheduleRepository = $this->getRepository('schedule');
        $time = $this->getCustomParam('time');
        $date = $this->getCustomParam('date');

        $rooms = $scheduleRepository->getAvailableRooms($date, $time);

        // set object to array in order to get it working with js
        $tmp = [];
        foreach ($rooms as $room) {
            $tmp[] = $room->toArray($room);
        }
        $data = array('rooms' => $tmp);

        return $this->application->json($data);
    }

    /**
     * Checks if the selected date is valid (a schedule cannot be made in the past and no more than 6 months ahead)
     *
     * @param string $date
     *
     * @return boolean
     */
    private function validateDate($date)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $maxScheduleDate = strtotime(date('Y-m-d', strtotime('+6 months')));
        $scheduledDate = strtotime($date);

        if ($scheduledDate <= $currentDate) {
            return $error
                = 'Please select a date from future (unless you have a time machine that can take you back in '.$date
                .'). ';
        }

        if ($scheduledDate >= $maxScheduleDate) {
            return $error = 'You cannot schedule a movie more than 6 months from now. ';
        }

        return true;
    }

    /**
     * Validates room availability at a given date and checks if movie is already scheduled
     *
     * @param string $room
     * @param string $movie
     * @param string $date
     * @param string $time
     *
     * @return string
     */
    private function validateRoomAndMovie($room, $movie, $date, $time)
    {
        $scheduleRepository = $this->getRepository('schedule');

        try {
            $schedules = $scheduleRepository->loadByProperties(['time' => $time, 'date' => $date]);
        } catch (\Exception $ex) {
            $this->addErrorMessage(
                'We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.'
            );

            return $this->showSchedule();
        }

        foreach ($schedules as $schedule) {
            if ($movie == $schedule->getMovieId() && $room == $schedule->getRoomId()) {
                return 'Movie is already scheduled with these dates. ';
            } else {
                if ($room == $schedule->getRoomId()) {
                    return "Room {$room} is already booked. ";
                }
            }
        }
    }

    /**
     * Checks if the input price is numeric
     *
     * @param int $price
     *
     * @return string
     */
    private function validatePrice($price)
    {
        if (!is_numeric($price)) {
            return "Please type a valid price";
        }
    }

    /**
     * Function to validate input data for adding a new schedule
     *
     * @param array $input
     *
     * @return type
     */
    private function validateSchedule(array $input)
    {
        $errors = '';
        foreach ($input as $field => $value) {
            if (empty($value)) {
                $errors .= "Please select a {$field}. ";
            } else {
                switch ($field) {
                    case 'date':
                        $dateError = $this->validateDate($value);
                        break;
                    case 'room':
                        $roomError = $this->validateRoomAndMovie(
                            $value,
                            $input['movie'],
                            $input['date'],
                            $input['time']
                        );
                        break;
                    case 'price':
                        $priceError = $this->validatePrice($value);
                }
            }
        }
        if (isset($dateError) && $dateError !== true) {
            $errors .= $dateError;
        } else {
            if (isset($roomError)) {
                $errors .= $roomError;
            }
        }

        if (isset($priceError)) {
            $errors .= $priceError;
        }

        return $errors;
    }

    /**
     * Adds a new schedule in the db
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addSchedule()
    {
        $errorResponse = array();
        $errorResponse['type'] = 'error';
        $errorResponse['title'] = 'Error!';

        $inputData = array(
            'movie' => $this->getPostParam('movie'),
            'date'  => $this->getPostParam('date'),
            'time'  => $this->getPostParam('time'),
            'room'  => $this->getPostParam('room'),
            'price' => $this->getPostParam('price'),
        );

        $errors = $this->validateSchedule($inputData);

        if (!empty($errors)) {
            $errorResponse['message'] = $errors;

            return $this->application->json($errorResponse);
        }

        try {
            $successResponse = array();
            $successResponse['type'] = 'success';
            $successResponse['title'] = 'Added!';

            $roomRepository = $this->getRepository('room');
            $room = $roomRepository->loadByProperties(['id' => $inputData['room']]);

            $properties = array(
                'movieId'        => (int)$inputData['movie'],
                'roomId'         => (int)$inputData['room'],
                'date'           => $inputData['date'],
                'time'           => $inputData['time'],
                'ticketPrice'    => floatval($inputData['price']),
                'remainingSeats' => (int)$room[0]->getCapacity(),
            );

            $time = explode(':', $properties['time']);
            $properties['time'] = (int)$time[0];

            $schedule = $this->getEntity('schedule', $properties);
            $scheduleRepository = $this->getRepository('schedule');

            $scheduleRepository->save($schedule);

            $successResponse['message'] = 'Movie successfully scheduled';

            return $this->application->json($successResponse);
        } catch (\Exception $ex) {
            $errorResponse['message']
                = 'We\'re sorry, something went terribly wrong while trying to schedule movie. Please try again later.';

            return $this->application->json($errorResponse);
        }
    }

    /**
     * Shows all scheduled movies.
     *
     * @return string
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
                'movieList' => $movieList,
            ];

            return $this->render('showscheduledmovies', $context);
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong!');

            return $this->render('showscheduledmovies', $context);
        }
    }

    /**
     * Renders all schedules from db
     *
     * @return string
     */
    public function listSchedules()
    {
        $data = ['dates' => []];
        $scheduleRepository = $this->getRepository('schedule');
        $schedules = $scheduleRepository->loadSchedulesGrouped('date');
        foreach ($schedules as $key => $schedule) {
            $data['dates'][] = $schedule['date'];
        }

        return $this->render('showschedules', $data);
    }

    /**
     * Sets a time display format for rendering
     *
     * @param array  $schedulesArray
     * @param string $format
     *
     * @return string
     */
    private function setTimeFormatDisplay($schedulesArray, $format)
    {
        $format = explode(':', $format);
        foreach ($schedulesArray as $key => $value) {
            $time = explode(':', $schedulesArray[$key]['time']);
            $displayTime = '';
            foreach ($format as $formatKey => $formatValue) {
                if (empty($displayTime)) {
                    $displayTime = $time[$formatKey];
                } else {
                    $displayTime .= ':'.$time[$formatKey];
                }
            }
            $schedulesArray[$key]['time'] = $displayTime;
        }

        return $schedulesArray;
    }

    /**
     * Renders a list of schedules for the selected date
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getDateSchedule()
    {
        $date = $this->getCustomParam('date');
        $schedulesRepository = $this->getRepository('schedule');
        $moviesRepository = $this->getRepository('movie');
        $roomsRepository = $this->getRepository('room');

        $currentSchedules = $schedulesRepository->getSchedulesPerDay($date);
        $currentSchedules = $this->setTimeFormatDisplay($currentSchedules, 'H:i');

        $data = array(
            'schedules' => $currentSchedules,
        );

        return $this->application->json($data);
    }

    /**
     * Deletes a schedule
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteSchedule()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        $scheduleId = $this->getCustomParam('id');
        $scheduleRepository = $this->getRepository('schedule');
        $schedule = $scheduleRepository->loadByProperties(['id' => $scheduleId]);

        if (empty($schedule)) {
            $errorResponse['message'] = 'Could not delete schedule!';

            return $this->application->json($errorResponse);
        }

        $schedule = reset($schedule);
        try {
            $scheduleRepository->delete($schedule);
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
