<?php

namespace Entity;

class Room extends Entity\AbstractEntity
{
    
    /**
     * Room name
     * @var string 
     */
    private $name;
    
    /**
     * Room capacity
     * @var int
     */
    private $capacity;
    
    
    /**
     * Room constructor
     * @param array $room
     */
    public function __construct(array $room) {
        
        $this->id = $room['id'];
        $this->name=$room['name'];
        $this->capacity=$room['capacity'];
        
    }
    
    /**
     * get Room name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * set Room name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * get Room capacity
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
    /**
     * set Room capacity
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }
            
    
}