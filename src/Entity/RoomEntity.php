<?php

namespace Entity;

class RoomEntity extends AbstractEntity
{

    private $name;
    private $capacity;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }
    
    public function getCapacity()
    {
        return $this->capacity;
    }
    
}
