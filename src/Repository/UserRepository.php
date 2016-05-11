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
     * @return UserEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        return new UserEntity($properties);
    }

    /**
     * The username will be the email of the user
     * {@inheritDoc}
     */
    public function loadUserByUsername($username) // the username will be the email
    {
        $usersByEmail = $this->loadByProperties(['email' => $username]);
        if (empty($usersByEmail)) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
        $user = reset($usersByEmail);
        return $user;
    }

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'Entity\UserEntity' === $class;
    }

}
