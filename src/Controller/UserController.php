<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UserController
 *
 * @author mariusadam
 */
class UserController {

    public function login(Request $request, Application $app) {

        $request->isMethod('POST');
    }

    public function showProfile(Application $app, Request $request) {
        $data = ['email' => $request->get('email')];
        return $app['twig']->render('profile.html', $data);
    }
    

}
