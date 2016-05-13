<?php

namespace Controller;

class UserController extends \Controller\AbstractController
{
    public function showProfile()
    {
        return $this->render('profile');
    }
     
    public function getClassName()
    {
        return 'Controller\\UserController';
    }

}
