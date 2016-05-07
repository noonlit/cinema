<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entity;

/**
 * Description of User
 *
 * @author mariusadam
 */
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
     * User constructor
     * 
     * @param int $id
     * @param string $email
     * @param string $password
     * @param boolean $active
     * @param string $role
     */
    /* public function __construct(array $attrs)
      {
      foreach ($attrs as $key => $value) {
      if (property_exists($this, $key)) {
      $this->$key = $attrs[$key];
      }
      }
      } */

    public function __construct($properties)
    {
        parent::__construct($properties);
        if (is_null($this->active) === true) {
            $this->active = true;
        }
        if (is_null($this->role) === true) {
            $this->role = -1;
        }
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
     * get User role
     * 
     * @return string
     */
    public function getRole()
    {
        return $this->role;
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
