<?php

namespace Repository;

use Entity\BookingEntity;

class BookingRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\BookingEntity object.
     *
     * @param array $properties
     * @return BookingEntity
     */
    protected function loadEntityFromArray(array $properties) 
    {
        return new BookingEntity($properties);
    }

}
