<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

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

    /**
     * @param int
     */
    public function setSeats($seats)
    {
        $this->seats = (int)$seats;
    }

    /**
     * @param int
     */
    public function setScheduleId($scheduleId)
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * @param int
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint(
            'seats',
            new Assert\NotBlank(
                array(
                    'message' => 'Please select the number of seats!',
                )
            )
        );
        $metadata->addPropertyConstraint(
            'seats',
            new Assert\Type(
                array(
                    'type'    => 'int',
                    'message' => 'The {{ }} for the number of seats is not a valid {{ type }}',
                )
            )
        ); // the what?
        $metadata->addPropertyConstraint(
            'seats',
            new Assert\Range(
                array(
                    'min'        => 1,
                    'max'        => 500,
                    'minMessage' => 'The number of seats must be at least {{ limit }}',
                    'maxMessage' => 'You can select maximum {{ limit }} seats',
                )
            )
        );
    }
}
