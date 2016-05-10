<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class AbstractController
{

    /**
     * 
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
    public function __construct(Application $app, Request $req)
    {
        $this->application = $app;
        $this->request = $req;
    }

    protected function render($template, array $parameters = array())
    {
        //takes into account current controller and creates path: templates/controller_name/$template.html
        //passes parameters
        // TODO: do it yourself
        return $this->application['twig']->render($template . '.html');
    }

    protected function getRepository($repositoryName)
    {
        $factory = $this->app['repository_factory'];
        return $factory->create($repositoryName);
    }

    protected function getSession()
    {
        return $this->application['session'];
    }

    protected function getUrlGenerator()
    {
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
    protected function redirectRoute($route, $routeParameters = array(), $status = 302, $headers = array())
    {
        $url = $this->getUrlGenerator()->generate($route, $routeParameters);
        return new RedirectResponse($url, $status, $headers);
    }

    protected function redirectUrl($url, $status = 302, $headers = array())
    {
        return new RedirectResponse($url, $status, $headers);
    }

    protected function get($name, $default = null)
    {
        return $this->request->get($name, $default);
    }

    /**
     * Adds a flash error message.
     * 
     * @param string $message
     */
    protected function addErrorMessage($message)
    {
        $session = $this->getSession();
        $session->getFlashBag()->add('error', $message);    
    }
    
    /**
     * Adds a flash info message.
     * 
     * @param string $message
     */
    protected function addInfoMessage($message)
    {
        $session = $this->getSession();
        $session->getFlashBag()->add('info', $message);     
    }
    
    /**
     * Adds a flash success message.
     * 
     * @param string $message
     */
    
    protected function addSuccessMessage($message)
    {
        $session = $this->getSession();;
        $session->getFlashBag()->add('success', $message);       
    }
    
    /**
     * Adds a flash debug message.
     * 
     * @param string $message
     */

    protected function addDebugMessage($message)
    {
        $session = $this->getSession();  
        $session->getFlashBag()->add('debug', $message);  
    }
    
    /**
     * Sends email using the desired library. 
     * 
     * @param string $library The library name
     * @param string $to
     * @param string $subject
     * @param string $body
     * @return false If the library doesn't exist.
     */

    protected function sendMail($library, $to, $subject, $body)
    {
        switch ($library) {
            case 'swiftmailer':
                $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom(array($this->application['swiftmailer.options']['username']))
                        ->setTo(array($to))
                        ->setBody($body);
                break;
            default:
                // for now, debug message?
                $this->addDebugMessage('No such library.');
                return false;
        }

        // for now, debug message?
        try {
            $this->application['mailer']->send($message);
        } catch (Exception $e) {
            $this->addDebugMessage($e->getMessage(), $e->getTraceAsString());
        }
    }

}
