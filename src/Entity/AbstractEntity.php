<?php 

namespace Entity;

abstract class AbstractEntity 
{
    protected $id;
    
    public function getId()
    {
        return $this->id;
    }
}