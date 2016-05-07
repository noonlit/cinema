<?php

namespace Framework\Initializer;

class Controller {

    const METHOD_GET = 'get';
    const METHOD_POST = 'post';

    private $application;
    private $controllers;

    public function __construct($application) {
        $this->application = $application;
        $this->controllers = [];
    }

    public function initialize(array $routingConfig) {

        foreach ($routingConfig as $routeElement) {

            /**
             * bine name which will appear in URL
             */
            $name = $routeElement['name'];
            /**
             * route name
             */
            $route = $routeElement['route'];
            /**
             * method type - GET/POST
             */
            $method = $routeElement['method'];
            /**
             * controller name
             */
            $controller = $routeElement['controller'];
            /**
             * method name
             */
            $action = $routeElement['action'];

            $controllerInstance = $this->createController($controller);

            /**
             * create a callable
             * $controllerInstance - controller object
             * $action - method which will be called
             */
            $callable = [$controllerInstance, $action];

            switch ($method) {
                case self::METHOD_GET:
                    $this->application->get($route, function () use ($controllerInstance,$callable){
                        $controllerInstance->initialize();
                        call_user_func_array($callable, func_get_args());
                    })->bind($name);
                    break;
                case self::METHOD_POST:
                    $this->application->post($route, $callable)->bind($name);
                    break;
            }
        }

        $application = $this->application;
        $this->application->error(function (\Exception $e, $code) use ($application) {
            if ($application['debug']) {
                return;
            }

            // 404.html, or 40x.html, or 4xx.html, or error.html
            $templates = array(
                'errors/' . $code . '.html',
                'errors/' . substr($code, 0, 2) . 'x.html',
                'errors/' . substr($code, 0, 1) . 'xx.html',
                'errors/default.html',
            );
            return new Response($application['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
        });
    }

    /**
     * @return \Controller\AbstractController 
     */
    private function createController($identifier) {

        if (isset($this->controllers[$identifier]) == false) {
            $className = '\\Controller\\' . ucfirst($identifier) . 'Controller';
            $controllerReflection = new \ReflectionClass($className);
            $controller = $controllerReflection->newInstance($this->application);
            $this->controllers[$identifier] = $controller;
        }

        return $this->controllers[$identifier];
    }

}
