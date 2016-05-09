<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Session\Session;

abstract class AbstractController
{
    /* @var $app Application */
    protected $app;
    
    /* @var $request Request */
    protected $request;
    
    /* @var $session Session */
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
}