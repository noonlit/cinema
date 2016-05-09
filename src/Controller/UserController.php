<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UserController
 *
 * @author mariusadam
 */
class UserController extends \Controller\AbstractController
{
    public function showProfile()
    {
        $data = ['email' => $this->session->get('user')->getEmail()];
        return $this->app['twig']->render('profile.html', $data);
    }

}
