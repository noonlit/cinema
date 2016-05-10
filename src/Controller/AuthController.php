<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Repository\UserRepository;

class AuthController extends AbstractController
{

    /**
     * Shows the register form.
     */
    public function showRegister()
    {
        return $this->render('register');
    }

    /**
     * Shows the login form.
     */
    public function showLogin()
    {
        return $this->render('login');
    }

    /* !! Attempt at refactoring ahead */
    
    /**
     * Registers a user.
     */

    public function register()
    {
        // do the passwords match?
        if (strcmp($this->request->get('password'), $this->request->get('password_retype')) !== 0) {
            $this->addErrorMessage('Passwords must match.');
            return $this->render('register', ['last_email' => $this->request->get('email')]);
        }

        // build properties array (to do: add some validation? or will the entity validators take care of this?)
        $properties = [
            'email' => $this->request->get('email', ''),
            'password' => password_hash($this->request->get('password', ''), PASSWORD_DEFAULT),
            'role' => -1,
            'active' => true,
        ];

        // get the repository
        $userRepository = $this->getRepository('user');

        // build an entity 
        $user = $userRepository->loadEntityFromArray($properties);

        // check if email already exists in db
        try {
            $usersByEmail = $userRepository->loadByProperties(['email' => $user->getEmail()]);
        } catch (Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to register you. Please try again later.'); // ? 
            return $this->render('register');
        }

        if (count($usersByEmail) == 0) {
            $this->addErrorMessage('This email is already associated with another account.');
            return $this->render('register', ['last_email' => $this->request->get('email')]);
        }

        // always try/catch when trying to talk to the db
        try {
            $userRepository->save($user);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to register you. Please try again later.'); // ??
            return $this->render('register');
        }

        $this->addSuccessMessage('Account succesfully created! You can now log in.');
        return $this->redirectRoute('show_login_page');
    }
    
    /*
     * Logs a user into their account. 
     */

    public function login()
    {
        // get the repository
        $userRepository = $this->getRepository('user');

        // check if email exists in db
        try {
            $usersByEmail = $userRepository->loadByProperties(['email' => $this->request->get('email')]);
        } catch (Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to log you in. Please try again later.'); // ? 
            return $this->render('login');
        }

        if (count($usersByEmail) == 0) {
            $this->addErrorMessage('Email not found.');
            return $this->render('login');
        }

        // our user should be on the first (and only) key
        $user = $usersByEmail[0];

        // check if the given password is correct
        if ($user->verifyPassword($this->request->get('password')) === false) {
            $this->addErrorMessage('Incorrect password.'); // ? 
            return $this->render('login');
        }
        
        // save user in session
        $session = $this->getSession();
        $session->set('user', $user);
        $this->addSuccessMessage('You are now logged in!');
        
        // the redirect should be to whatever page they were on before they logged in, not the profile
        // but, for now ...
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('show_profile');
        return $this->application->redirect($url); // or something?
    }
    
    public function logout()
    {
        $session = $this->getSession();
        $session->clear();
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('homepage');
        return $this->application->redirect($url); // or something?
    }

    /*
     *** 
     * 
     * 
     * Initial version
     * 
     * 
     ***
     */

    public function doRegister(Application $app, Request $req)
    {
        // why are we throwing exceptions here? they're just normal errors, aren't they?
        try {
            if (strcmp($req->get('password'), $req->get('password_retype')) != 0) {
                throw new \Exception('Passwords must match');
            }
            $properties = [
                'email' => $req->get('email', ''),
                'password' => password_hash($req->get('password', ''), PASSWORD_DEFAULT),
                'role' => -1,
                'active' => true,
            ];
            $user = new \Entity\UserEntity($properties);
            /* @var $session Session */
            $session = $app['session'];
            /* @var $userRepo UserRepository */
            $userRepo = $app['user_repository'];
            if ($userRepo->loadByProperties(['email' => $user->getEmail()])) {
                throw new \Exception('This email is already associated with another account!');
            }
            $userRepo->save($user);
            $session->getFlashBag()->add('success', 'Account succesfully created!You can now log in.');

            return $this->redirectRoute('show_login_page');
        } catch (\Exception $ex) {
            $app['session']->getFlashBag()->add('error', $ex->getMessage());
            return $app['twig']->render('register.html', ['last_email' => $req->get('email')]);
        }
    }

    public function doLogin(Application $app, Request $req)
    {
        /* @var $session Session */
        $session = $app['session'];
        /* @var $userRepo UserRepository */
        $userRepo = $app['user_repository'];
        try {
            $users = $userRepo->loadByProperties(['email' => $req->get('email')]);
            if (empty($users)) {
                throw new \Exception('Email not found!');
            }
            /* @var $user \Entity\UserEntity */
            $user = reset($users);
            if ($user->verifyPassword($req->get('password')) == false) {
                throw new \Exception('Incorrect password');
            }
            $session->set('user', $user);
            $session->getFlashBag()->add('success', 'You are now logeed in!');
            $redirect = $app['url_generator']->generate('show_profile');
            return $app->redirect($redirect);
        } catch (\Exception $ex) {
            $app['session']->getFlashBag()->add('error', $ex->getMessage());
            return $app['twig']->render('login.html');
        }
    }

    public function doLogout(Application $app, Request $req)
    {
        /* @var $session Session */
        $session = $app['session'];
        $session->clear();
        $redirect = $app['url_generator']->generate('homepage');
        return $app->redirect($redirect);
    }

}
