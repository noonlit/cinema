<?php

namespace Controller;

use Entity\ScheduleEntity;

class ScheduleController extends AbstractController {

    private function tableObjectToArray($entries) {
        $array = [];
        foreach ($entries as $entry) {
            $array[] = $entry->toArray();
        }
        return $array;
    }

    public function showSchedule() {
        $movies = $this->getRepository('movie');
        $rooms = $this->getRepository('room');
        $movies = $movies->loadAll();
        $rooms = $rooms->loadAll();
        $data = ['movies' => array(), 'rooms' => array()];
        $data['movies'] = $this->tableObjectToArray($movies);
        $data['rooms'] = $this->tableObjectToArray($rooms);
        return $this->render('schedule', $data);
    }

    private function validatorScheduleData(array $scheduleData) {
        $schedule_repo = $this->getRepository('schedule');        
        $booked_rooms = $schedule_repo->loadByProperties(['time' => $scheduleData['time']]);
        //var_dump($booked_rooms);
        
        
        return true;//$errors;
    }

    public function addSchedule() {          
        $properties = array(
            'movieId' => $this->getPostParam('movie'),
            'roomId' => $this->getPostParam('room'),
            'date' => $this->getPostParam('date'),
            'time' => $this->getPostParam('time')
        );
        $schedule = new ScheduleEntity($properties);
    
        // validate entries;
        // + validate below
        // search for rooms that are booked at the time selected by user
        $schedule_repo = $this->getRepository('schedule'); 
        $schedules = $schedule_repo->loadByProperties(['time' => $time, 'date' => $date]);         
        foreach($schedules as $schedule){
            if($movie == $schedule->getMovieId() && $room == $schedule->getRoomId()) {
               echo 'movie is already scheduled with these dates';
            }            
            else if ($room == $schedule->getRoomId()) {
                echo 'room is already booked';
            }            
        }
        echo 'success';
        
        //
        
        
//$errors = $this->validatorScheduleData(['time'=>$time, 'room'=>$room]);
        return true;
    }

    protected function getClassName() {
        return 'Controller\\ScheduleController';
    }

}
