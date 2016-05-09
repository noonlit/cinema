<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class UserEntity extends AbstractEntity
{

    /**
     * User email
     * @var string
     */
    protected $email;

    /**
     * User password
     * @var string
     */
    protected $password;

    /**
     * User status
     * @var boolean
     */
    protected $active;

    /**
     * User role
     * @var string
     */
    protected $role;

    /**
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        if (is_null($this->active) === true) {
            $this->active = true;
        }

        if (is_null($this->role) === true) {
            $this->role = -1;
        }
    }
    
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('first_name', new Assert\Length(array('min' => 10)));
        $metadata->addPropertyConstraint('last_name', new Assert\Length(array('min' => 10)));
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
        // if we return the role itself, we'll have to remember which value represents which level of permissions every time we call this
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

}
