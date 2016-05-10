<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\SwiftmailerServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new SwiftmailerServiceProvider());

$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            // add custom globals, filters, tags, ...

            return $twig;
        }));

$app->before(function (Request $request) use ($app) {
    $protected = array(
        '/admin' => 1,
        '/user' => -1,
    );
    $loggedUser = $app['session']->get('user');

    $path = $request->getPathInfo();
    if ($loggedUser == null) {
        if (strpos($path, '/admin') !== FALSE || strpos($path, '/user') !== FALSE) {
            throw new AccessDeniedException();
        }
    } else {
//        var_dump($path, $loggedUser);
        foreach ($protected as $protectedPath => $role) {
            if (strpos($path, $protectedPath) !== FALSE && $loggedUser->getRole() < $role) {
                throw new AccessDeniedException();
            }
        }
    }
});

return $app;
