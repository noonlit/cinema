<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class AbstractController {

    /**
     * @var Application 
     */
    protected $application;

    /**
     * @var Request 
     */
    protected $request;

    /**
     * 
     * @param Application $app
     * @param Request $req
     */
    public function __construct(Application $app, Request $req) {
        $this->application = $app;
        $this->request = $req;
    }

    protected function render($template, array $parameters = array()) {
        //takes into account current controller and creates path: templates/controller_name/$template.html
        //passes parameters
        // TODO: do it yourself
        return $this->application['twig']->render($template . '.html');
    }

    protected function getRepository($entityName) {
//        $factory = $this->app['repository_factory'];
//        return $factory->create($entityName);
    }

    protected function getSession() {
        // TODO
    }

    protected function getUrlGenerator() {
        return $this->application['url_generator'];
    }

    /**
     * Returns redirect to route
     * 
     * @param string $route
     * @param array $routeParameters Optional
     * @param int $status Optional
     * @param array $headers Optional
     * @return RedirectResponse Optional
     */
    protected function redirectRoute($route, $routeParameters = array(), $status = 302, $headers = array()) {
        $url = $this->getUrlGenerator()->generate($route, $routeParameters);
        return new RedirectResponse($url, $status, $headers);
    }

    protected function redirectUrl($url, $status = 302, $headers = array()) {
        return new RedirectResponse($url, $status, $headers);
    }

    protected function get($name, $default = null) {
        return $this->request->get($name, $default);
    }

    protected function addErrorMessage($message) {
        
    }

    protected function addInfoMessage($message) {
        
    }

    protected function addDebugMessage($message) {
        
    }

}
