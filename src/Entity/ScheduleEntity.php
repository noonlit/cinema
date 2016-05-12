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
    
    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date) 
    {
        $this->date = $date;
    }
    
    /**
     * @param string $time
     */
    
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param int $remainingSeats
     */
    
    public function setRemainingSeats($remainingSeats)
    {
        $this->remainingSeats = $remainingSeats;
    }
    
    /** 
     * @param int $ticketPrice
     */
    public function setTicketPrice($ticketPrice)
    {
        $this->ticketPrice = $ticketPrice;
    }
    
    /** 
     * @param int $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    /** 
     * @param int $roomId
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }    
    
}