<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

use Silex\Application as Application;
use Symfony\Component\HttpFoundation\Request as Request;

/**
 * Description of MainController
 *
 * @author Andrei
 */
class MainController extends AbstractController
{

    public function index()
    {
        return $this->app['twig']->render('index.html');
    }

    public function hello(Application $app, Request $req)
    {
        $name = $req->get('name');
        var_dump($name);
        return $app['twig']->render('hello.html');
    }

    public function helloCineva(Application $app, Request $req)
    {
        $name = $req->get('name');
        var_dump($name);
        return $app['twig']->render('hello.html');
    }

}
