<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Repository\RoomRepository;
use Repository\ScheduleRepository;
use Symfony\Component\Routing\RouteCollection as RouteCollection; //TO USE FOR WRONG ROUTES
use DateTime;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShowOccupancy
 *
 * @author bogdanhaidu
 */
class OccupancyController extends \Controller\AbstractController
{

    public function indexOccupancy()
    {
        $scheduleList = $this->getAllSchedules();

        $availableRooms = $this->getAllRooms();
        $roomsList = $this->getAllRooms();
        //$parameters = $this->session->get('query_rezults');
        if ($scheduleList) {
            $show_results = true;
        }
        $sortedSchedules = $this->getSortedSchedulesByRoomId($roomsList);
        $sortedMoviesTitle = $this->sortedScheduleMovieAndOccupancyInfo($sortedSchedules, $roomsList);

        $dates = array();
        $dates_formated = array();
        foreach ($sortedSchedules as $sortedElement) {
            foreach ($sortedElement as $schedule) {
                $dates_formated[] = $schedule->getStringDate('d M');
                $dates[] = $schedule->getStringDate();
            }
        }
        $uniqueformatedDates = array_unique($dates_formated);
        $uniqueDates = array_unique($dates);
        $parameters = array(
            'available_rooms' => $availableRooms,
            'rooms' => $roomsList,
            'schedules' => $scheduleList,
            'dates' => $uniqueDates,
            'dates_formated' => $uniqueformatedDates,
            'show_results' => $show_results,
            'selected' => "",
            'sorted_schedules' => $sortedSchedules,
            'sorted_movies' => $sortedMoviesTitle,
        );

        return $this->render('occupancy', $parameters);
    }

    /**
     * this function is called after a get occupancy level form is submited
     * using the roomId and the date with the getmethod
     * it uses a query function to return the desired value (the percent)
     * and saves the resulted data in a session variable
     * after that it redirects to the result occupancy page
     * @return silex render
     */
    public function queryOccupancy($roomId, $dates)
    {
        $availableRooms = $this->getAllRooms();
        $roomsList = $this->getRoomsList($roomId);
        //if date and roomId values are not empty
        // calls the schedulesRepository method with query and renders the results
        if ($roomId) {
            $sortedSchedules = $this->getSortedSchedulesByRoomId($roomsList, $dates);
            $sortedMoviesInfo = $this->sortedScheduleMovieAndOccupancyInfo($sortedSchedules, $roomsList);

            //parameters used for rendering
            $parameters = array(
                'available_rooms' => $availableRooms,
                'rooms' => $roomsList,
                'sorted_schedules' => $sortedSchedules,
                'sorted_movies' => $sortedMoviesInfo,
            );
            $this->session->set('query_rezults', $parameters);
            return $this->render('occupancy_table', $parameters);
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Wrong query'));
        }
    }

    public function getSortedSchedulesByRoomId($roomsList, $dates = "")
    {
        $schedulesRepository = $this->getRepository('schedule');
        $sortedSchedules = array_keys($roomsList);
        array_walk($roomsList, function($item, $key)use($schedulesRepository, &$sortedSchedules,$dates) {
            if (!empty($dates)) {
                $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId(), 'date' => $dates]);
            }
            if (empty($dates)||$dates=="all") {
                $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId()]);
            }
        });
        return $sortedSchedules;
    }

    public function sortMovies($sortedSchedules)
    {
        $movieRepository = $this->getRepository('movie');
        $sortedMovie = array();
        array_walk($sortedSchedules, function($item, $key)use($movieRepository, &$sortedMovie) {
            $movie = $movieRepository->loadByProperties(['id' => $item->getMovieId()]);
            $title = $movie[0]->getTitle();
            $sortedMovie[$key] = $title;
        });
        return $sortedMovie;
    }

    public function getOccupancyLevel($remaining_seats, $capacity)
    {
        if ($capacity > 0) {
            $occupancy = round(($capacity - $remaining_seats) * 100 / $capacity, 2);
            return $occupancy;
        }
    }

    public function sortedScheduleMovieAndOccupancyInfo($sortedSchedules, $roomList)
    {
        $movieRepository = $this->getRepository('movie');
        $sortedMovieInfo = array();
        foreach ($sortedSchedules as $upperKey => $schedule) {
            $capacity = $roomList[$upperKey]->getCapacity();

            array_walk($schedule, function($item, $key)use($movieRepository, $upperKey, $capacity, &$sortedMovieInfo) {
                $movie = $movieRepository->loadByProperties(['id' => $item->getMovieId()]);
                $title = $movie[0]->getTitle();
                $id = $movie[0]->getId();
                $sortedMovieInfo[$upperKey][$key]['title'] = $title;
                $sortedMovieInfo[$upperKey][$key]['id'] = $id;
                $sortedMovieInfo[$upperKey][$key]['occupancy_level'] = $this->getOccupancyLevel($item->getRemainingSeats(), $capacity);
            });
        }
        return $sortedMovieInfo;
    }

    /**
     * This is used just for rendering purpose to show last selected date
     * basicaly the resulted array with queried schedules has some values
     * this functions returns the key from this array which has a date coresponding to the selected date
     * this then modifies the html select tag to show the last selected date 
     * @param array $schedules
     * @param string $selectedDate
     * @return string
     */
    public function getSelectedDayKey($schedules, $selectedDate)
    {
        foreach ($schedules as $key => $schedule) {
            $selectedDay = "";
            if ($schedule['date'] . " " . $schedule['time'] == $selectedDate) {
                $selectedDay = $key;
            }
        }
        return $selectedDay;
    }

    /**
     * returns the schedule dates for a room
     * @param int $roomId
     * @return array
     */
    public function getRoomScheduleDatesById($roomId)
    {
        $schedulesRepository = $this->getRepository('schedule');
        return $schedulesRepository->getSchedulesDatesForRoom($roomId);
    }

    /**
     * This function is used by the javascript functions which 
     * sends an url with parameters (room id) to this function and returns
     * a list with schedules dates
     * if succesfully it populates the date selector with values for the current
     * selected room
     * @return json
     */
    public function getRoomSchedule()
    {
        $roomId = $this->getCustomParam('id');
        $date = $this->getQueryParam('date');
        if ($this->getQueryParam('format') == 'json') {
            $schedulesRepository = $this->getRepository('schedule');
            if ($roomId != "all") {
                
                $current_schedules = $schedulesRepository->getSchedulesDatesForRoom($roomId);
            } else {
                $current_schedules = $schedulesRepository->getAllSchedulesDatesForRoom();
            }
            $data = array(
                'current_room' => $current_schedules
            );

            return $this->application->json($data);
        } else {
            return $this->queryOccupancy($roomId, $date);
        }
    }

    public function getRoomsList($roomId = "all")
    {
        if ($roomId == "all") {
            return $this->getAllRooms();
        } else {
            return $this->getRoomsById($roomId);
        }
    }

    public function getRoomsById($id)
    {
        $roomsRepository = $this->getRepository('room');
        if (method_exists($roomsRepository, 'loadByProperties')) {
            return $roomsRepository->loadByProperties(['id' => $id]);
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
    }

    public function getAllRooms()
    {
        $roomsRepository = $this->getRepository('room');
        if (method_exists($roomsRepository, 'loadAll')) {
            return $roomsRepository->loadAll();
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
    }

    public function getAllSchedules()
    {
        $schedulesRepository = $this->getRepository('schedule');
        if (method_exists($schedulesRepository, 'loadAll')) {
            return $schedulesRepository->loadAll();
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
    }

    public function getAllMovies()
    {
        $movieRepository = $this->getRepository('movie');
        if (method_exists($movieRepository, 'loadAll')) {
            return $movieRepository->loadAll();
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
    }

    /**
     * to avoid wrong url after occupancy/
     */
    public function redirectOccupancy()
    {
        $app = $this->application;
        $app->abort(404, sprintf('Page does not exist.'));
    }

}
