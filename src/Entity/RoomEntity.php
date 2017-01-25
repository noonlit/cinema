<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class RoomEntity extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $capacity;

    /**
     * @param ClassMetadata $metadata
     */
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\Type(array(
            'type'=> 'string',
            'message' => 'The name {{ value }} is not a valid {{ type }}.',)));
        $metadata->addPropertyConstraint('name', new Assert\Length(array(
            'min'        => 3,
            'max'        => 15,
            'minMessage' => 'Your room name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your room name cannot be longer than {{ limit }} characters',
        )));
        $metadata->addPropertyConstraint('capacity', new Assert\NotBlank());
        $metadata->addPropertyConstraint('capacity', new Assert\Type(array(
            'type'=> 'int',
            'message' => 'The capacity {{ value }} is not a valid {{ type }}.',)));
        $metadata->addPropertyConstraint('capacity', new Assert\Range(array(
            'min'        => 1,
            'max'        => 500,
            'minMessage' => 'Your room capacity must have at least {{ limit }} seat',
            'maxMessage' => 'Your room capacity cannot have more than {{ limit }} seats',
        )));
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int
     */
    public function setCapacity($capacity)
    {
        $this->capacity = (int) $capacity;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
    
}
