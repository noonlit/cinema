<?php 

namespace Entity;

abstract class AbstractEntity 
{
    protected $id;
    
    public function __construct($properties)
    {
        foreach ($properties as $key => $value) {
            if (property_exists($this, $key)) {
            $this->{$key} = $properties[$key];
            }
        }
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }
}