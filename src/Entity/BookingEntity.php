<?php

namespace Entity;

class BookingEntity extends AbstractEntity
{
    /**
     * @var int
     */
    protected $seats;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int -- to do: rename db tables so the vars can have proper names
     */
    protected $scheduleId;

    /**
     * @return int
     */
    public function getSeats(){
        return $this->seats;
    }

    /**
     * @return int
     */
    public function getScheduleId(){
        return $this->scheduleId;
    }
}