<?php

namespace Repository;

class UserRepository extends AbstractRepository
{

    protected function loadArrayFromEntity(\Entity\User $entity)
    {
        parent::loadArrayFromEntity($entity);
    }
    
    protected function loadEntityFromArray(array $attrs)
    {
        return new \Entity\User($attrs);
    }

}
