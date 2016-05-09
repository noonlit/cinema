<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;


class ScheduleEntity extends AbstractEntity
{

    /**
     * @var string
     */
    //protected $date;
    
    /**
     * @var string
     */
    //protected $time;
   
    /**
     * @var int
     */
    
    protected $dateTime;
    
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

        $date = explode('-',$properties['date']);
        $this->dateTime = new \DateTime();
        $this->dateTime->setDate($date[0], $date[1], $date[2]);
        
        $time = explode(':', $properties['time']);
        $this->dateTime->setTime($time[0], $time[1], $time[2]);
    }
    
    
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('dateTime', new Assert\NotBlank());
        $metadata->addPropertyConstraint('dateTime', new Assert\DateTime());
        $metadata->addPropertyConstraint('remainingSeats', new Assert\NotBlank());
        $metadata->addPropertyConstraint('remainingSeats', new Assert\Type(array(
            'type'=> 'int',
            'message' => 'The number of remaining seats {{ value }} is not a valid {{ type }}.',)));
        $metadata->addPropertyConstraint('remainingSeats', new Assert\Range(array(
            'min'        => 0,
            'max'        => 500,
            'minMessage' => 'The number of remaining seats cannot be less then {{ limit }}',
            'maxMessage' => 'The number of remaining seats cannot be greater then {{ limit }}',
        )));
        $metadata->addPropertyConstraint('ticketPrice', new Assert\NotBlank());
        $metadata->addPropertyConstraint('ticketPrice', new Assert\Type(array(
            'type'=>'float',
            'message' => 'The ticket price {{ value }} is not a valid {{ type }}.',)));
        $metadata->addPropertyConstraint('ticketPrice', new Assert\Range(array(
            'min'        => 1,
            'minMessage' => 'The ticket price cannot be less then {{ limit }}',
            
        )));
        $metadata->addPropertyConstraint('roomId', new Assert\NotBlank());
        $metadata->addPropertyConstraint('roomId', new Assert\Type(array(
            'type'=> 'int',
            'message' => 'The room id {{ value }} is not a valid {{ type }}.',)));
        $metadata->addPropertyConstraint('movieId', new Assert\NotBlank());
        $metadata->addPropertyConstraint('movieId', new Assert\Type(array(
            'type'=> 'int',
            'message' => 'The movie id {{ value }} is not a valid {{ type }}.',)));
        
        
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
    
    public function toArray() {
        $properties = parent::toArray();
        
    
        
        $properties['date'] = $properties['date_time']->format('Y-m-d');
        $properties['time'] = $properties['date_time']->format('H:i:s');
        unset($properties['date_time']);
        
        return $properties;
    }
}