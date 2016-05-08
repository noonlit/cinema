<?php

namespace Framework\Initializer;

use Silex\Application as Application;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response as Response;
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
            $name = $routeElement['name'];

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
            $className = '\\Controller\\' . ucfirst($controller) . 'Controller';
            switch ($method) {
                case self::METHOD_GET:
                    $this->application->get($route, "{$className}::{$action}")
                            ->bind($name);
                    break;

                case self::METHOD_POST:
                    $this->application->post($route, "{$className}::{$action}")
                            ->bind($name);
                    break;
                case self::METHOD_MATCH:
                    $this->application->match($route, "{$className}::{$action}")
                            ->bind($name);
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
            $controllerReflection = new \ReflectionClass($className);
            $controller = $controllerReflection->newInstance($this->application);
            $this->controllers[$identifier] = $controller;
        }

        return $this->controllers[$identifier];
    }

}