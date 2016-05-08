<?php

namespace Repository;

use Entity\ScheduleEntity;

class ScheduleRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\ScheduleEntity object.
     *
     * @param array $properties
     * @return ScheduleEntity
     */
    protected function loadEntityFromArray(array $properties) 
    {
        return new ScheduleEntity($properties);
    }

}
