<?php

namespace Repository;

use Entity\UserEntity;

class UserRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\UserEntity object.
     *
     * @param array $properties
     * @return UserEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        return new UserEntity($properties);
    }

}
