<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class GenreEntity extends AbstractEntity {

    /**
     * @var string
     */
    protected $name;

    /**
     * set Genre name
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * get Genre name
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('name', new Assert\NotNull()); 
        $metadata->addPropertyConstraint('name', new Assert\Length(array(
            'min' => 1,
            'max' => 50,
            'minMessage' => 'Your genre name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your genre name cannot be longer than {{ limit }} characters',
        )));
    }

}
