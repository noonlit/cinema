<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

class UserEntity extends AbstractEntity implements UserInterface
{

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var string
     */
    protected $role;

    /**
     * @param ClassMetadata $metadata
     */
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint(
            'email',
            new Assert\NotBlank(
                array(
                    'message' => 'The email should not miss.',
                )
            )
        );
        $metadata->addPropertyConstraint(
            'email',
            new Assert\Email(
                array(
                    'message' => 'The email is invalid.',
                )
            )
        );
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
    }

    /**
     * get User email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * set User email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * verify User password
     *
     * @return bool
     */
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * set User password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * get User status
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * set User status
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * check if User is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == 1;
    }

    /**
     * set User role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * get User role
     *
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * get User password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Username is in this case the email
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getRoles()
    {
        if ($this->isAdmin()) {
            return array('ROLE_ADMIN');
        }

        return array("ROLE_USER");
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active == true;
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

}
