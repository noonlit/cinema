<?php

namespace Repository;

use Entity\RoomEntity;

class RoomRepository extends AbstractRepository {

    /**
     * Converts properties array to \Entity\RoomEntity object.
     *
     * @param array $properties
     * @return RoomEntity
     */
    protected function loadEntityFromArray(array $properties) {
        return new RoomEntity($properties);
    }

}
