<?php

namespace Repository;

use Entity\GenreEntity;

class GenreRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\Genre object.
     *
     * @param array $properties
     * @return GenreEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        return new GenreEntity($properties);
    }

}
