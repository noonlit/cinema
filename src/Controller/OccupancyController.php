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
        //$scheduleList = $schedulesRepository->loadAll();
        $datetime = new DateTime("2016-05-08");
        $time = new DateTime("2016-05-09");
        //var_dump($roomsRepository>loadAll());
        $roomsList = $roomsRepository->loadAll();
        $show_results = false;
        $parameters = array('rooms' => $roomsList,'show_results'=>$show_results);
        $scheduleList = $schedulesRepository->getOccupancyForRoomOnDate($datetime,$time, 3);
        var_dump($scheduleList);
        return $this->render('occupancy', $parameters);
    }
    public function queryOccupancy()
    {
        $schedulesRepository = $this->getRepository('schedule');
        //$scheduleList = $schedulesRepository->loadAll();
        $roomsRepository = $this->getRepository('room');
        var_dump($_POST);
        $date = explode(" ",$_POST['date']);
        $datetime = new DateTime($date[0]);
        $time = new DateTime($date[1]);
        
        $roomsList = $roomsRepository->loadAll();
        $scheduleList = $schedulesRepository->getOccupancyForRoomOnDate($datetime, $time,(int)$_POST['room']);
        $show_results = true;
        var_dump($scheduleList);
        $parameters = array('rooms' => $roomsList,
            'schedule' => $scheduleList,
                'show_results'=>$show_results);
        return $this->render('occupancy', $parameters);
    }
    public function getRoomSchedule()
    {
        $id = (int)$this->getCustomParam('id');
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