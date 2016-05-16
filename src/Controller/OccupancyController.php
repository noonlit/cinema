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
        echo "test";
        $roomsRepository = $this->getRepository('room');
        if (method_exists($roomsRepository, 'loadAll')) {
            $roomsList = $roomsRepository->loadAll();
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
        $show_results = false; //will not show table with results
        $parameters = array('rooms' => $roomsList,
            'show_results' => $show_results,
            'selected' => "",
            'selected_date' => "",
            'dates' => $this->getRoomScheduleDatesById(1),);

        return $this->render('occupancy', $parameters);
    }

    /**
     * after a get occupancy level form is submited
     * the session stored values are used to render this page 
     * @return silex render page
     */
    public function resultsOccupancy()
    {
        if (!empty($this->session->get('query_rezults'))) {
            $parameters = $this->session->get('query_rezults');
        } else {
            return $this->redirectRoute('admin_show_occupancy');
        }
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
    public function queryOccupancy()
    {
        $schedulesRepository = $this->getRepository('schedule');
        $roomsRepository = $this->getRepository('room');
        $roomId = (int) $this->getQueryParam('room', '');
        $show_results = false;
        //if true calls the schedulesRepository method with query and renders the results
        if ($this->getQueryParam('date', '') != "" && $roomId) {
            $dateTime = new DateTime($this->getQueryParam('date', ''));
            $date = new DateTime($dateTime->format('Y-m-d'));
            $time = new DateTime($dateTime->format('H:i:s'));

            if (method_exists($roomsRepository, 'loadAll') && method_exists($schedulesRepository, 'getOccupancyForRoomOnDate')) {
                $roomsList = $roomsRepository->loadAll(); //used for the select html tag
                $scheduleList = $schedulesRepository->getOccupancyForRoomOnDate($date, $time, $roomId);
            } else {
                $app = $this->application;
                $app->abort(404, sprintf('Sorry wrong room repository / schedule method.'));
            }
            if ($scheduleList) {
                $show_results = true;
            }
            $selected = $roomId; // tags the last selected room from the select list
            $selectedDate = $dateTime->format('Y-m-d H:i:s');
            $schedules = $this->getRoomScheduleDatesById($roomId);
            $parameters = array('rooms' => $roomsList,
                'schedule' => $scheduleList,
                'show_results' => $show_results,
                'selected' => $selected,
                'selected_date' => $this->getSelectedDayKey($schedules, $selectedDate),
                'dates' => $this->getRoomScheduleDatesById($roomId));
            $this->session->set('query_rezults', $parameters);
            return $this->redirectRoute('admin_show_occupancy_results');
        } else {
            return $this->redirectRoute('admin_show_occupancy');
        }
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
        $id = (int) $this->getCustomParam('id');
        $schedulesRepository = $this->getRepository('schedule');
        $current_schedules = $schedulesRepository->getSchedulesDatesForRoom($id);

        $data = array(
            'current_room' => $current_schedules
        );

        return $this->application->json($data);
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
