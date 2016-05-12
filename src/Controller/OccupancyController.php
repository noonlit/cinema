<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Repository\RoomRepository;
use Repository\ScheduleRepository;
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

    public function showOccupancy()
    {
        $schedulesRepository = $this->getRepository('schedule');
        $roomsRepository = $this->getRepository('room');
        $roomsList = $roomsRepository->loadAll();
        $show_results = false;
        $parameters = array('rooms' => $roomsList, 'show_results' => $show_results,'selected'=>"");
        return $this->render('occupancy', $parameters);
    }

    public function queryOccupancy()
    {
        $schedulesRepository = $this->getRepository('schedule');
        $roomsRepository = $this->getRepository('room');
        $roomId = (int) $this->getPostParam('room', '');
        var_dump($this->getPostParam('date', ''));
        if ($this->getPostParam('date', '') != "" && $roomId) {
            $dateTime = new DateTime($this->getPostParam('date', ''));
            $date = new DateTime($dateTime->format('Y-m-d'));
            $time = new DateTime($dateTime->format('H:i:s'));

            $roomsList = $roomsRepository->loadAll();
            $scheduleList = $schedulesRepository->getOccupancyForRoomOnDate($date, $time, $roomId);
            $show_results = true;
            $new_array = array();
            $selected = $roomId;
            $parameters = array('rooms' => $roomsList,
                'schedule' => $scheduleList,
                'show_results' => $show_results,
                'selected'=>$selected);
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

    public function getClassName()
    {
        return 'Controller\\OccupancyController';
    }

    //put your code here
}
