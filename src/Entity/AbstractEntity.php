<?php 

namespace Entity;

abstract class AbstractEntity 
{
    protected $id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }
}