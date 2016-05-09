<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of MovieController
 *
 * @author sergiu
 */
class MovieController extends AbstractController {
    
    public function showPaginated(Application $app, Request $req) {
        var_dump($app['movie_repository']->loadPage(1,3));
    }
    
}
