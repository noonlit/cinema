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

    public function login(Application $app, Request $req)
    {
        
    }

    public function showRegister()
    {
        return $this->render('register.html');
    }

    public function showLogin()
    {
        return $this->render('login.html');
    }

    public function doRegister()
    {
        try {
            if (strcmp($this->getPostParam('password', ''), $this->getPostParam('password_retype')) != 0) {
                throw new \Exception('Passwords must match');
            }
            $properties = [
                'email' => $this->getPostParam('email'),
                'password' => password_hash($this->getPostParam('password', ''), PASSWORD_DEFAULT),
                'role' => -1,
                'active' => true,
            ];
            $user = new \Entity\UserEntity($properties);
            /* @var $userRepo UserRepository */
            $userRepo = $this->app['user_repository'];
            if ($userRepo->loadByProperties(['email' => $user->getEmail()])) {
                throw new \Exception('This email is already associated with another account!');
            }
            $userRepo->save($user);
            $this->session->getFlashBag()->add('success', 'Account succesfully created!You can now log in.');
            $redirect = $this->app['url_generator']->generate('show_login_page');
            return $this->app->redirect($redirect);
        } catch (\Exception $ex) {
            $this->getFlashBag()->add('error', $ex->getMessage());
            return $this->render('register.html', ['last_email' => $this->getPostParam('email')]);
        }
    }

    public function doLogin()
    {
        $userRepo = $this->app['user_repository'];
        try {
            $users = $userRepo->loadByProperties(['email' => $this->getPostParam('email')]);
            if (empty($users)) {
                throw new \Exception('Email not found!');
            }
            /* @var $user \Entity\UserEntity */
            $user = reset($users);
            if ($user->verifyPassword($this->getPostParam('password')) == false) {
                throw new \Exception('Incorrect password');
            }
            $this->setLoggedUser($user);
            $this->getFlashBag()->add('success', 'You are now logeed in!');
            $redirect = $this->app['url_generator']->generate('show_profile');
            return $this->app->redirect($redirect);
        } catch (\Exception $ex) {
            $this->getFlashBag()->add('error', $ex->getMessage());
            return $this->render('login.html');
        }
    }

    public function doLogout()
    {
        $this->session->clear();
        $redirect = $this->app['url_generator']->generate('homepage');
        return $this->app->redirect($redirect);
    }

}
