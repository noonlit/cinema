<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Session\Session;

/**
 * @property Application $app
 * @property Session $session
 * @property Request $request
 */
abstract class AbstractController
{

    protected $app;
    protected $request;
    protected $session;

    public function __construct()
    {
        
    }

    public function initialize(\Silex\Application $app)
    {
        $this->app = $app;
        $this->request = $app['request'];
        $this->session = $app['session'];
    }

    public function getFlashBag()
    {
        return $this->session->getFlashBag();
    }

    public function getCustomParam($attribute, $default=null)
    {
        return $this->request->attibutes->get($attribute, $default);
    }

    public function getLoggedUser()
    {
        return $this->session->get('user');
    }

    public function setLoggedUser(\Entity\UserEntity $user)
    {
        $this->session->set('user', $user);
    }

    public function getPostParam($param, $default=null)
    {
        return $this->request->request->get($param, $default);
    }

    public function getQueryParam($param, $default=null)
    {
        return $this->request->query->get($param, $default);
    }

    public function render($view, $data = [])
    {
        if (array_key_exists('user', $data) == false) {
            $data = $data + ['user' => $this->getLoggedUser()];
        }
        if (array_key_exists('flashBag', $data) == false) {
            $data = $data + ['flashBag' => $this->session->getFlashBag()];
        }
        return $this->app['twig']->render($view, $data);
    }

}
