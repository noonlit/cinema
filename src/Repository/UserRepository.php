<?php

namespace Repository;

use Entity\UserEntity;

class UserRepository extends AbstractRepository
{

    protected function loadEntityFromArray(array $properties)
    {
        return new UserEntity($properties);
    }

}
