<?php

namespace Controller;

class UserController extends \Controller\AbstractController
{
    public function showProfile()
    {
        $data = ['email' => $this->session->get('user')->getEmail()];
        return $this->render('profile', $data);
    }
    
    public function getClassName()
    {
        return 'Controller\\UserController';
    }

}
