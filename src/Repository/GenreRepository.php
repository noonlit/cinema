<?php

namespace Repository;

use Entity\UserEntity;

class GenreRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return UserEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        return new UserEntity($properties);
    }

}
