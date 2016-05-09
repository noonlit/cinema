<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Silex\Provider\TranslationServiceProvider as TranslationServiceProvider;

abstract class AbstractController
{

    /* @var $app Application */

    protected $app;

    /* @var $request \Symfony\Component\BrowserKit\Request */
    protected $request;
    protected $form;

    public function setApplication(Application $app)
    {
        $this->app = $app;
    }

    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }

    public function createForm($data = null)
    {
        $app = $this->app;
        
        $app->register(new TranslationServiceProvider(), array(
            'translator.domains' => array(),
        ));
        $app->register(new FormServiceProvider());
        $this->app = $app;
        return $this->form = $this->app['form.factory']->createBuilder('form', $data);
    }

    public function addFormInputs($data = null, array $options = array())
    {
        foreach ($data as $key => $input) {
            $this->form->add($key);
        }
        return $this->app['form.factory']->createBuilder('form', $data, $options);
    }

    public function getForm()
    {
        return $this->form->getForm();
    }

    public function handleRequest($request)
    {
        return $this->form->handleRequest($request);
    }

    public function formIsValid()
    {
        return $this->form->isValid();
    }

    public function createFormView()
    {
        $form = $this->form;
        return array('form' => $form->createView());
    }

    public function getFormClass()
    {
        return $this->form;
    }

}
