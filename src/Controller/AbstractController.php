<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    /**
     * 
     * @param string $template the name of the template
     * @return string the full path to the template
     */
    private function getRealTemplatePath($template)
    {
        $className = $this->getClassName();
        $arr = (explode('\\', $className));
        $controller = end($arr);
        $folder = substr($controller, 0, strlen($controller) - strlen('Controller'));
        return "{$folder}/{$template}.html";
    }

    /**
     * 
     * @param string $template the template name
     * @param array $context an associative array containing necessary variables to render $template
     * @return html template
     */
    protected function render($template, array $context = array())
    {
        if (array_key_exists('user', $context) == false) {
            $context = $context + ['user' => $this->getLoggedUser()];
        }
        if (array_key_exists('flashBag', $context) == false) {
            $context = $context + ['flashBag' => $this->session->getFlashBag()];
        }
        $realTemplatePath = $this->getRealTemplatePath($template);
        return $this->application['twig']->render($realTemplatePath, $context);
    }

    protected function cleanInput(&$input)
    {
        if (is_array($input)) {
            foreach ($input as $key => $value) {
                 $this->cleanInput($input[$key]);
            }
        } else {
            $input = trim(filter_var($input, FILTER_SANITIZE_STRING));
        }
    }

    /**
     * If the route contained /foo/bar/{param} of /foo/{param}/bar , 
     * this function returns the real value of param 
     * @param string $attribute the name of the wanted attribute
     * @param mixed $default
     * @return mixed
     */
    protected function getCustomParam($attribute, $default = null)
    {
        $value = $this->request->attributes->get($attribute, $default);
        $this->cleanInput($value);
        return $value;
    }

    /**
     * Returns the current logged in user or null
     * @return \Entity\UserEntity|null
     */
    protected function getLoggedUser()
    {
        $token = $this->application['security']->getToken();
        if ($token != null) {
            return $token->getUser();
        }
        return null;
    }

    /**
     *  Returns a params sent using POST method
     * @param string $param
     * @param mixed $default
     * @return mixed
     */
    protected function getPostParam($param, $default = null)
    {
        $value = $this->request->request->get($param, $default);
        $this->cleanInput($value);
        return $value;
    }

    /**
     *  Returns a paramter from the query string
     * @param string $param
     * @param mixed $default
     * @return mixed
     */
    protected function getQueryParam($param, $default = null)
    {
        $value = $this->request->query->get($param, $default);
        $this->cleanInput($value);
        return $value;
    }

    /**
     * 
     * @return Session
     */
    protected function getSession()
    {
        return $this->session;
    }

    /**
     * Returns a repository.
     * 
     * @param string $repositoryName the name of the wanted repository
     * @return \Repository\AbstractRepository
     */
    protected function getRepository($repositoryName)
    {
        $factory = $this->application['repository_factory'];
        return $factory->create($repositoryName);
    }

    /**
     * Returns an entity.
     * 
     * @param mixed $entityName 
     * @param array $properties 
     * @return \Entity\AbstractEntity;
     */
    public function getEntity($entityName, array $properties)
    {
        $factory = $this->application['entity_factory'];
        return $factory->createFromArray($entityName, $properties);
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

    /**
     * Creates a redirect response so that it conforms to the rules defined for a redirect status code.
     *
     * @param string $url     The URL to redirect to. The URL should be a full URL, with schema etc.,
     *                        but practically every browser redirects on paths only as well
     * @param int    $status  The status code (302 by default)
     * @param array  $headers The headers (Location is always set to the given URL)
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     *
     */
    protected function redirectUrl($url, $status = 302, $headers = array())
    {
        return new RedirectResponse($url, $status, $headers);
    }

    /**
     * Gets a "parameter" value from any bag.
     *
     * This method is mainly useful for libraries that want to provide some flexibility. If you don't need the
     * flexibility in controllers, it is better to explicitly get request parameters from the appropriate
     * public property instead (attributes, query, request).
     *
     * Order of precedence: PATH (routing placeholders or custom attributes), GET, BODY
     *
     * @param string $key     the key
     * @param mixed  $default the default value if the parameter key does not exist
     *
     * @return mixed
     */
    protected function get($key, $default = null)
    {
        return $this->request->get($key, $default);
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
        $session = $this->getSession();
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
        } catch (\Exception $e) {
            $this->addDebugMessage($e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * 
     * @return string the current class name
     */
    protected function getClassName()
    {
        return get_called_class();
    }

    /**
     * 
     * @return string the current document root
     */
    protected function getDocumentRoot()
    {
        return $this->request->server->get('DOCUMENT_ROOT');
    }

    /**
     * ex: for http://example.com/path/smth returns http://example.com
     * @return string, the HTTP_ORIGIN
     */
    protected function getHttpOrigin()
    {
        return $this->request->server->get('HTTP_ORIGIN');
    }

    /**
     *
     * @param mixed $data    The response data
     * @param int   $status  The response status code
     * @param array $headers An array of response headers
     * @return JsonResponse represents an HTTP response in JSON format.
     */
    protected function jsonResponse($data = array(), $status = 200, $headers = array())
    {
        $response = new JsonResponse($data, $status, $headers);
        return $response;
    }

}
