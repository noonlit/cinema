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
        $roomsRepository = $this->getRepository('room');
        if (method_exists($roomsRepository, 'loadAll')) {
            $roomsList = $roomsRepository->loadAll();
        } else {
            $app = $this->application;
            $app->abort(404, sprintf('Sorry wrong repository.'));
        }
        $show_results = false; //will not show table with results
        $parameters = array('rooms' => $roomsList, 'show_results' => $show_results, 'selected' => "");
        return $this->render('occupancy', $parameters);
    }

    public function queryOccupancy()
    {
        $schedulesRepository = $this->getRepository('schedule');
        $roomsRepository = $this->getRepository('room');
        $roomId = (int) $this->getPostParam('room', '');
        //if true calls the schedulesRepository method with query and renders the results
        if ($this->getPostParam('date', '') != "" && $roomId) {
            $dateTime = new DateTime($this->getPostParam('date', ''));
            $date = new DateTime($dateTime->format('Y-m-d'));
            $time = new DateTime($dateTime->format('H:i:s'));

            if (method_exists($roomsRepository, 'loadAll') && method_exists($schedulesRepository, 'getOccupancyForRoomOnDate')) {
                $roomsList = $roomsRepository->loadAll(); //used for the select html tag
                $scheduleList = $schedulesRepository->getOccupancyForRoomOnDate($date, $time, $roomId);
                $scheduleList2 = $schedulesRepository->getOccupancyForRoomOnDate2($date, $time, $roomId);
                var_dump($scheduleList2);
            } else {
                $app = $this->application;
                $app->abort(404, sprintf('Sorry wrong room repository / schedule method.'));
            }
            $show_results = true; //shows the results TODO EMPTY RESULTS
            $selected = $roomId; // tags the last selected room from the select list
            $parameters = array('rooms' => $roomsList,
                'schedule' => $scheduleList,
                'show_results' => $show_results,
                'selected' => $selected);
            return $this->render('occupancy', $parameters);
        } else {
            return $this->redirectRoute('admin_show_occupancy');
        }
    }

    public function getRoomSchedule()
    {
        $id = (int) $this->getCustomParam('id');
        $schedulesRepository = $this->getRepository('schedule');
        $roomsRepository = $this->getRepository('room');
        $roomsList = $roomsRepository->loadAll();
        $current_schedules = $schedulesRepository->getSchedulesDatesForRoom($id);

        $data = array(
            'current_room' => $current_schedules
        );

        return $this->application->json($data);
    }

    public function redirectOccupancy()
    {
        $app = $this->application;
        $app->abort(404, sprintf('Page does not exist.'));
    }

    public function getClassName()
    {
        return 'Controller\\OccupancyController';
    }

    //put your code here
}
