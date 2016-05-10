<?php

namespace Controller;
//
class MainController extends AbstractController {

    public function index() {
        return $this->render('index');
    }

    public function hello() {
        /*$name = $req->get('name');
        var_dump($name);
        return $app['twig']->render('hello.html');*/
    }

    public function helloCineva() {
        /*$name = $req->get('name');
        var_dump($name);
        return $app['twig']->render('hello.html');*/
    }

}
