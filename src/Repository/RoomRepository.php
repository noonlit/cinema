<?php

namespace Repository;

use Entity\RoomEntity;

class RoomRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\RoomEntity object.
     *
     * @param array $properties
     *
     * @return RoomEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $entity = new RoomEntity();
        $entity->setPropertiesFromArray($properties);

        return $entity;
    }

}
