<?php

namespace Repository;

class UserRepository extends AbstractRepository
{

    public function loadArrayFromEntity(\Entity\User $entity)
    {
        parent::loadArrayFromEntity($entity);
    }
    
    public function loadEntityFromArray(array $attrs)
    {
        return new \Entity\User($attrs);
    }

}
