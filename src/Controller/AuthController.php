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

    public function doRegister(Application $app, Request $req)
    {
        try {
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
            $app['session']->getFlashBag()->add('success', 'Account succesfully created!');
            $session->set('user', $user);
            $redirect = $app['url_generator']->generate('show_profile');
            return $app->redirect($redirect);
        } catch (\Exception $ex) {
            var_dump($_POST);
            $app['session']->getFlashBag()->add('error', $ex->getMessage());
            return $app['twig']->render('register.html');
        }
    }

}
