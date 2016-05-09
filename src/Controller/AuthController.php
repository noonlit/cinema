<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

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
            ];
            $user = new \Entity\UserEntity($properties);
            $userRepo = $app['user_repository'];
            $userRepo->save($user);
            $app['session']->getFlashBag()->add('success', 'Account succesfully created!');
            $redirect = $app['url_generator']->generate('show_profile', array('email' => $req->get('email')));
            return $app->redirect($redirect);
        } catch (\Exception $ex) {
            var_dump($_POST);
            $app['session']->getFlashBag()->add('error', 'Some error!');
            return $app['twig']->render('index.html');
        }
    }

}
