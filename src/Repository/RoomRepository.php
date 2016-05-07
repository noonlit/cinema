<?php

namespace Repository;

use Entity\RoomEntity;

class RoomRepository extends AbstractRepository
{
    /**
     * Converts properties array to \Entity\Room object.
     *
     * @param array $properties
     * @return UserEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        return new RoomEntity($properties);
    }

}
