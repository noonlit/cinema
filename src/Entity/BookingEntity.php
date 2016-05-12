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
     * @var int
     */
    protected $scheduleId;

    /**
     * @return int
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @return int
     */
    public function getScheduleId()
    {
        return $this->scheduleId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

}
