<?php

namespace Repository;

use Entity\Room;


class RoomRepository extends AbstractRepository
{
   
    /**
     * make Room entity from array
     * @param array $properties
     * @return Room
     */
    private function loadEntityFromArray(array $properties)
    {
        return new \Entity\Room($properties);
    }
    /**
     * make an array from Room entity
     * @param Room $entity
     */
    private function loadArrayFromEntity(\Entity\Room $entity) {
        
        parent::loadArrayFromEntity($entity);
    }
}
