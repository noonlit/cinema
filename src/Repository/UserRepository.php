<?php

namespace Repository;

use Entity\UserEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserRepository extends AbstractRepository implements UserProviderInterface
{

    /**
     * Converts properties array to \Entity\UserEntity object.
     *
     * @param array $properties
     *
     * @return UserEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        $entity = new UserEntity();
        $entity->setPropertiesFromArray($properties);

        return $entity;
    }

    /**
     * The username will be the email of the user
     *
     * @param string $username
     *
     * @return \Entity\UserEntity
     * @throws UsernameNotFoundException
     */
    public function loadUserByUsername($username)
    {
        $usersByEmail = $this->loadByProperties(['email' => $username]);
        if (empty($usersByEmail)) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
        $user = reset($usersByEmail);

        return $user;
    }

    /**
     * @param UserInterface $user
     *
     * @return \Entity\UserEntity
     * @throws UnsupportedUserException
     * @throws UsernameNotFoundException
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }

        $id = $user->getId();
        $usersById = $this->loadByProperties(['id' => $user->getId()]);
        if (empty($usersById)) {
            throw new UsernameNotFoundException(sprintf('User with id %s not found', json_encode($id)));
        }
        $refreshedUser = reset($usersById);

        return $refreshedUser;
    }

    /**
     * @param string $class
     *
     * @return boolean
     */
    public function supportsClass($class)
    {
        return 'Entity\UserEntity' === $class;
    }

}
