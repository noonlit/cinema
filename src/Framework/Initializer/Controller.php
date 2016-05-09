<?php

namespace Framework\Initializer;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller {

    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const METHOD_MATCH = 'match';

    private $application;
    private $controllers;

    public function __construct(Application $application) {
        $this->application = $application;
        $this->controllers = [];
    }

    public function initialize(array $routingConfig) {

        foreach ($routingConfig as $routeElement) {

            /**
             * bine name
             */
            $routeName = $routeElement['name'];

            /**
             * route name from URL
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
             * method name found in controller
             */
            $action = $routeElement['action'];
            $self = $this;
            switch ($method) {
                case self::METHOD_GET:
                    $this->application->get($route, function(Application $app, Request $req) use ($self, $controller, $action) {
                        $controllerInstance = $self->createController($controller, $app, $req);
                        $callback = [$controllerInstance, $action];
                        return call_user_func($callback);
                    })->bind($routeName);
                    break;

                case self::METHOD_POST:
                    $this->application->post($route, function(Application $app, Request $req) use ($self, $controller, $action) {
                        $controllerInstance = $self->createController($controller, $app, $req);
                        $callback = [$controllerInstance, $action];
                        return call_user_func($callback);
                    })->bind($routeName);
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
    private function createController($identifier, Application $app, Request $request) {

        if (isset($this->controllers[$identifier]) == false) {
            $className = '\\Controller\\' . ucfirst($identifier) . 'Controller';
            $controllerReflection = new \ReflectionClass($className);
            $controller = $controllerReflection->newInstance($app, $request);

            $this->controllers[$identifier] = $controller;
        }

        return $this->controllers[$identifier];
    }

}
