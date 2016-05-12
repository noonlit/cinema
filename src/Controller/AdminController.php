<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Controller\AbstractController as AbstractController;

class AdminController extends AbstractController{

    public function changeStatus(Application $app, Request $req) {
//        $userId = $req->get('userId');
        $userId = 2;
        $userRepo = $app['user_repository'];
        $session = $app['session'];
        try {
            $userArray = $userRepo->loadByProperties(array('id' => $userId));
            $userObject = $userArray[0];
            $userObject->setActive(1 - $userObject->getActive());
            $userRepo->save($userObject);
            $session->getFlashBag()->add('success', 'Account status succesfully changed!');
            $redirect = $app['url_generator']->generate('show_login_page');
        } catch (\Exception $ex) {
            $app['session']->getFlashBag()->add('error', 'Id does not exist!');
            return $app['twig']->render('login.html');
        }
        return $app->redirect($redirect);
    }

}
