<?php

namespace Entity;

class ScheduleEntity extends AbstractEntity
{

    /**
     * @var string
     */
    protected $date;
    
    /**
     * @var string
     */
    protected $time;
    
    /**
     * @var int
     */
    protected $remainingSeats;
    
    /**
     * @var float
     */
    protected $ticketPrice;
    
    /**
     * @var int
     */
    protected $roomId;
    
    /**
     * @var int
     */
    protected $movieId;

    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $date = explode('-',$this->date);
        $this->date = new \DateTime();
        $this->date->setDate($date[0], $date[1], $date[2]);
        
        $time = explode(':', $this->time);
        $this->time = new \DateTime();
        $this->time->setTime($time[0], $time[1], $time[2]);
    }
    
    
    /**
     * @return string
     */
    public function getDate(){
        return $this->date;
    }
    /**
     * @return string
     */
    public function getTime(){
        return $this->time;
    }
    /**
     * @return int
     */
    public function getRemainingSeats(){
        return $this->remainingSeats;
    }
    /**
     * @return float
     */
    public function getTicketPrice(){
        return $this->ticketPrice;
    }
    
    /** 
     * @return int
     */
    public function getRoomId(){
        return $this->roomId;
    }
    /**
     * @return int
     */
    public function getMovieId(){
        return $this->movieId;
    }
}