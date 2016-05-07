<?php

namespace Entity;

class GenreEntity extends AbstractEntity
{

    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}
