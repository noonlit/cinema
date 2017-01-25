<?php

namespace Entity;

use Framework\Util\CaseConverterTrait;

abstract class AbstractEntity
{

    use CaseConverterTrait;

    /**
     * @var int
     */
    protected $id;

    public function __construct()
    {

    }

    /**
     * @param array $properties
     */
    public function setPropertiesFromArray(array $properties)
    {
        foreach ($properties as $key => $value) {
            $property = $this->snakeToCamelCase($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $properties = get_object_vars($this);
        $propertiesToArray = array();

        foreach ($properties as $key => $value) {
            $property = $this->camelToSnakeCase($key);
            $propertiesToArray[$property] = $value;
        }

        return $propertiesToArray;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}
