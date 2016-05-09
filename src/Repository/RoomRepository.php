<?php

namespace Repository;

<<<<<<< HEAD
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
=======
use Entity\RoomEntity;

class RoomRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\RoomEntity object.
     *
     * @param array $properties
     * @return RoomEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        return new RoomEntity($properties);
    }

>>>>>>> c698c74f0be46876a91f8ac063f95a9f3666dcf5
}
