<?php 

namespace Entity;

abstract class AbstractEntity 
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        foreach ($properties as $key => $value) {
            if (property_exists($this, $key)) {
            $this->{$key} = $properties[$key];
            }
        }
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

}