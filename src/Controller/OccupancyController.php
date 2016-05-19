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
        $scheduleList = $this->getAllEntities('schedule');

        $roomsList = $availableRooms = $this->getAllEntities('room');

        //$parameters = $this->session->get('query_rezults');
        if ($scheduleList) {
            $show_results = true;
        }
        $sortedSchedules = $this->getSortedSchedulesByRoomId($roomsList);
        $sortedMoviesTitle = $this->sortedScheduleMovieAndOccupancyInfo($sortedSchedules, $roomsList);

        $dates = array();
        $dates_formated = array();
        $times = array();
        foreach ($sortedSchedules as $sortedElement) {
            foreach ($sortedElement as $schedule) {
                $dates_formated[] = $schedule->getStringDate('d M');
                $dates[] = $schedule->getStringDate();
                $times[] = $schedule->getTime();
            }
        }
        $uniqueformatedDates = array_unique($dates_formated);
        $uniqueDates = array_unique($dates);
        $uniqueTimes = array_unique($times);
        sort($uniqueTimes);
        $parameters = array(
            'available_rooms' => $availableRooms,
            'rooms' => $roomsList,
            'schedules' => $scheduleList,
            'dates' => $uniqueDates,
            'dates_formated' => $uniqueformatedDates,
            'times' => $uniqueTimes,
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
    public function queryOccupancy($roomId, $dates, $times)
    {
        $availableRooms = $this->getAllEntities('room');
        $roomsList = $this->getRoomsList($roomId);
        //if date and roomId values are not empty
        // calls the schedulesRepository method with query and renders the results
        if ($roomId) {

            $sortedSchedules = $this->getSortedSchedulesByRoomId($roomsList, $dates, $times);
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

    public function getSortedSchedulesByRoomId($roomsList, $dates = "", $times = "")
    {
        $schedulesRepository = $this->getRepository('schedule');
        $sortedSchedules = array_keys($roomsList);
        array_walk($roomsList, function($item, $key)use($schedulesRepository, &$sortedSchedules, $dates, $times) {
            if (!empty($dates)) {
                if (empty($times) || $times == "all") {
                    $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId(), 'date' => $dates]);
                } else {
                    $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId(), 'date' => $dates, 'time' => $times]);
                }
            }
            if (empty($dates) || $dates == "all") {
                if (empty($times) || $times == "all") {
                    $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId()]);
                } else {
                    $sortedSchedules[$key] = $schedulesRepository->loadByProperties(['room_id' => $item->getId(), 'time' => $times]);
                }
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
     * used in relation with javascript
     * affects the select values for date and time
     * or renders a table which
     * @return json or html
     */
    public function getRoomSchedule() //TODO CHANGE THE FUNCTION NAME+ROUTS UPDATE
    {
        $roomId = $this->getCustomParam('id');
        $date = $this->getQueryParam('date');
        $time = $this->getQueryParam('time');
        if ($this->getQueryParam('format') == 'json') {
            $schedulesRepository = $this->getRepository('schedule');
            if ($roomId != "all") {

                $current_dates_schedules = $schedulesRepository->getDistinctScheduledDatesForRoom($roomId);
                $current_times_schedules = $schedulesRepository->getDistinctSchedulesTimesForRoom($roomId, $date);
            } else {
                $current_dates_schedules = $schedulesRepository->getDistinctSchedulesDates();
                if (!empty($date) && $date != "all") {
                    $current_times_schedules = $schedulesRepository->getDistinctSchedulesTimesByDate($date);
                } else {
                    $current_times_schedules = $schedulesRepository->getDistinctSchedulesTimes($date);
                }
            }
            $data = array(
                'dates' => $current_dates_schedules,
                'times' => $current_times_schedules
            );

            return $this->application->json($data);
        } else {
            return $this->queryOccupancy($roomId, $date, $time);
        }
    }

    public function getRoomsList($roomId = "all")
    {
        if ($roomId == "all") {
            return $this->getAllEntities('room');
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

    public function getAllEntities($entity)
    {
        $roomsRepository = $this->getRepository($entity);
        if (method_exists($roomsRepository, 'loadAll')) {
            return $roomsRepository->loadAll();
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
