<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UserController
 *
 * @author mariusadam
 */
class UserController extends \Controller\AbstractController {

    public function login(Request $request, Application $app) {

        $request->isMethod('POST');
    }

    public function showProfile() {
        //$data = ['email' => $request->get('email')];
        //return $app['twig']->render('profile.html', $data);
    }

}
