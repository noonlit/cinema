<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Repository\UserRepository;

/**
 * Description of AuthController
 *
 * @author andrabarsoianu
 */
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

    private function validaterRegisterUserData($userData)
    {
        $email = $userData['email'];
        $pass = $userData['password'];
        $errors = "";
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors .= 'Email is invalid.';
        }
        if (strlen($pass) < 6 || strlen($pass) > 32) {
            $errors .= 'Password must contain between 6 and 32 characters.';
        }
        return $errors;
    }

    /* !! Attempt at refactoring ahead */

    /**
     * Registers a user.
     */
    public function register()
    {
        $errors = $this->validaterRegisterUserData([
            'email' => $this->getPostParam('email', ''),
            'password' => $this->getPostParam('password', ''),
        ]);
        if (!empty($errors)) {
            $this->addErrorMessage($errors);
            return $this->render('register', ['last_email' => $this->request->get('email')]);
        }
        $email = filter_var($this->getPostParam('email', ''), FILTER_SANITIZE_EMAIL);
        $pass = $this->getPostParam('password', '');
        $passRetype = $this->getPostParam('password_retype', '');
        // do the passwords match?
        if (strcmp($pass, $passRetype) !== 0) {
            $this->addErrorMessage('Passwords must match.');
            return $this->render('register', ['last_email' => $this->request->get('email')]);
        }
        $encoder = $this->application['security.encoder_factory']->getEncoder(new \Entity\UserEntity());
        // compute the encoded password for $user
        $passwordHash = $encoder->encodePassword($pass, null);
        // build properties array (to do: add some validation? or will the entity validators take care of this?)
        $properties = [
            'email' => $email,
            'password' => $passwordHash,
            'role' => -1,
            'active' => true,
        ];

        // get the repository
        $userRepository = $this->getRepository('user');

        // build an entity 
        $user = new \Entity\UserEntity($properties);

        // check if email already exists in db
        try {
            $usersByEmail = $userRepository->loadByProperties(['email' => $user->getEmail()]);
        } catch (Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to register you. Please try again later.'); // ? 
            return $this->render('register');
        }

        if (count($usersByEmail) !== 0) {
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
        return $this->redirectRoute('homepage');
    }

    /*
     * Logs a user into their account. 
     */

    public function login()
    {
        die();
        // get the repository
        $userRepository = $this->getRepository('user');

        // check if email exists in db
        try {
            $usersByEmail = $userRepository->loadByProperties(['email' => $this->getPostParam('email')]);
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
        $encoder = $this->application['security.encoder_factory']->getEncoder($user);
        $passwordHash = $encoder->encodePassword($this->getPostParam('password', ''), null);
        // check if the given password is correct
        if ($user->getPassword() != $passwordHash) {
            $this->addErrorMessage('Incorrect password.'); // ? 
            return $this->render('login');
        }

        // save user in session
        $this->setLoggedUser($user);
        $this->addSuccessMessage('You are now logged in!');

        // the redirect should be to whatever page they were on before they logged in, not the profile
        // but, for now ...
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('show_profile');
        return $this->application->redirect($url); // or something?
    }

    //using silex security service, this won tbe called
    public function logout()
    {
        $this->session->clear();
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('homepage');
        return $this->application->redirect($url); // or something?
    }

    public function getClassName()
    {
        return 'Controller\\AuthController';
    }

}
