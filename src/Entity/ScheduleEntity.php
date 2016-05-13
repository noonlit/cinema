<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

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
        //$validator = new \Framework\Validator\ScheduleValidator();
       // $validator->validate($this);
        $this->date = new \DateTime($properties['date']);
        $this->date = $this->date->format('Y-m-d');
    }

    /**
     * 
     * @param ClassMetadata $metadata
     */
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('date', new Assert\NotBlank(array(
            'message' => 'The date field should not be empty.'
        )));
        $metadata->addPropertyConstraint('date', new Assert\Date(array(
            'message' => 'The date is not valid.'
        )));
        $metadata->addPropertyConstraint('time', new Assert\NotBlank(array(
            'message' => 'The time field should not be empty.'
        )));
        $metadata->addPropertyConstraint('time', new Assert\Type(array(
            'type' => 'int',
            'message' => 'The time {{ value }} is not a valid {{ type }}')));
        $metadata->addPropertyConstraint('time', new Assert\Range(array(
            'min' => 8,
            'max' => 20,
            'minMessage' => 'The time cannot be less then {{ limit }}',
            'maxMessage' => 'The time cannot be greater then {{ limit }}'
        )));
        $metadata->addPropertyConstraint('remainingSeats', new Assert\NotBlank(array(
            'message' => 'The remaining seats field should not be empty.'
        )));
        $metadata->addPropertyConstraint('remainingSeats', new Assert\Type(array(
            'type' => 'int',
            'message' => 'The number of remaining seats {{ value }} is not a valid {{ type }}')));
        $metadata->addPropertyConstraint('remainingSeats', new Assert\Range(array(
            'min' => 0,
            'max' => 500,
            'minMessage' => 'The number of remaining seats cannot be less then {{ limit }}',
            'maxMessage' => 'The number of remaining seats cannot be greater then {{ limit }}'
        )));
        $metadata->addPropertyConstraint('ticketPrice', new Assert\NotBlank(array(
            'message' => 'The ticket price field should not be empty.'
        )));
        $metadata->addPropertyConstraint('ticketPrice', new Assert\Type(array(
            'type' => 'float',
            'message' => 'The ticket price {{ value }} is not a valid {{ type }}')));
        $metadata->addPropertyConstraint('ticketPrice', new Assert\Range(array(
            'min' => 1,
            'minMessage' => 'The ticket price cannot be less then {{ limit }}'
        )));
        $metadata->addPropertyConstraint('roomId', new Assert\NotBlank(array(
            'message' => 'The roomId field should not be empty.'
        )));
        $metadata->addPropertyConstraint('roomId', new Assert\Type(array(
            'type' => 'int',
            'message' => 'The room id {{ value }} is not a valid {{ type }}')));
        $metadata->addPropertyConstraint('movieId', new Assert\NotBlank(array(
            'message' => 'The movieId field should not be empty.'
        )));
        $metadata->addPropertyConstraint('movieId', new Assert\Type(array(
            'type' => 'int',
            'message' => 'The movie id {{ value }} is not a valid {{ type }}')));
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getRemainingSeats()
    {
        return $this->remainingSeats;
    }

    /**
     * @return float
     */
    public function getTicketPrice()
    {
        return $this->ticketPrice;
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @return int
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'time' => $this->getTime(),
            'remaining_seats' => $this->getRemainingSeats(),
            'ticket_price' => $this->getTicketPrice(),
            'room_id' => $this->getRoomId(),
            'movie_id' => $this->getMovieId(),
        );
    }

}
