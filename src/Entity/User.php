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
class User extends \Entity\AbstractEntity
{

    /**
     * User email
     * @var string
     */
    private $email;

    /**
     * User password
     * @var string
     */
    private $password;

    /**
     * User status
     * @var boolean
     */
    private $active;

    /**
     * User role
     * @var string
     */
    private $role;

    /**
     * User constructor
     * 
     * @param int $id
     * @param string $email
     * @param string $password
     * @param boolean $active
     * @param string $role
     */
    public function __construct(array $attrs)
    {
        foreach ($attrs as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $attrs[$key];
            }
        }
    }

    /**
     * get User id
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set User id
     * 
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * get User password
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
