<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    /* @var $app Application */
    protected $app;
    
    /* @var $request \Symfony\Component\BrowserKit\Request */
    protected $request;
    
    public function __construct()
    {
        ;
    }
}