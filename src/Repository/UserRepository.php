<?php

namespace Repository;

class UserRepository extends AbstractRepository
{

    public function loadArrayFromEntity(\Entity\User $entity)
    {
        return [
            'id' => $entity->getId(),
            'email' => $entity->getEmail(),
            'password' => $entity->getPassword(),
            'role' => $entity->getRole(),
            'active' => $entity->getActive(),
                
        ];
    }
    
    public function loadEntityFromArray(array $attrs)
    {
        return new \Entity\User($attrs);
    }

}
