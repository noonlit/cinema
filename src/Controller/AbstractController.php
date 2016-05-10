<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @property Application $application
 * @property Session $session
 * @property Request $request
 */
abstract class AbstractController
{

    protected $application;
    protected $request;
    protected $session;
    /**
     * 
     * @param Application $app
     * @param Request $req
     */
    public function __construct(Application $app, Request $req)
    {
        $this->application = $app;
        $this->request = $req;
        $this->session = $app['session'];
    }
    
    private function getRealTemplatePath($template)
    {
        $className = $this->getClassName();
        $arr = (explode('\\', $className));
        $controller = end($arr);
        $folder = substr($controller, 0, strlen($controller) - strlen('Controller'));
        return "{$folder}/{$template}.html";
    }
    
    protected function render($template, array $context = array())
    {
        //takes into account current controller and creates path: templates/controller_name/$template.html
        //passes parameters
        // TODO: do it yourself
        if (array_key_exists('user', $context) == false) {
            $context = $context + ['user' => $this->getLoggedUser()];
        }
        if (array_key_exists('flashBag', $context) == false) {
            $context = $context + ['flashBag' => $this->session->getFlashBag()];
        }
        $realTemplatePath = $this->getRealTemplatePath($template);
        return $this->application['twig']->render($realTemplatePath, $context);
    }

    public function getCustomParam($attribute, $default=null)
    {
        return $this->request->attributes->get($attribute, $default);
    }

    public function getLoggedUser()
    {
        $token = $this->application['security']->getToken();
        if ($token != null) {
            return $token->getUser();
        }
        return null;
    }

    public function getPostParam($param, $default=null)
    {
        return $this->request->request->get($param, $default);
    }

    public function getSession()
    {
        return $this->session;
    }
    
    public function getQueryParam($param, $default=null)
    {
        return $this->request->query->get($param, $default);
    }
    
    protected function getRepository($repositoryName)
    {
        $factory = $this->application['repository_factory'];
        return $factory->create($repositoryName);
    }
    
    protected function getDefaultEncoder()
    {
        return $this->application['security.encoder.digest'];
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
        $this->session->getFlashBag()->add('error', $message);    
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
    
    abstract protected function getClassName();

}
