<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Repository\UserRepository;

/**
 * Description of AuthController
 *
 * @author andrabarsoianu
 */
class AuthController
{

    public function login(Application $app, Request $req)
    {
        
    }

    public function showRegister(Application $app, Request $req)
    {
        return $app['twig']->render('register.html');
    }

    public function showLogin(Application $app, Request $req)
    {
        return $app['twig']->render('login.html');
    }

    public function doRegister(Application $app, Request $req)
    {
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
            $redirect = $app['url_generator']->generate('show_login_page');
            return $app->redirect($redirect);
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
