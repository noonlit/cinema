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

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'login' => array(
            'pattern' => '^/',
            'form' => array(
                'login_path' => '/auth/login',
                'check_path' => '/auth/dologin',
                'default_target_path' => '/user/profile',
                'username_parameter' => 'email',
                'password_parameter' => 'password',
            ),
            'logout' => array('logout_path' => '/auth/logout'),
            'anonymous' => true,
            'users' => $app->share(function () use ($app) {
                return $app['repository_factory']->create('user');
            }),
        ),
                    
    ),
    'security.role_hierarchy' => array(
       'ROLE_ADMIN' => array('ROLE_USER'),
    ),
));

// Protect admin/user urls.
$app->before(function (Request $request) use ($app) {
    $protected = array(
        '/admin/' => 'ROLE_ADMIN',
        '/user/' => 'ROLE_USER',
    );
    $path = $request->getPathInfo();
    foreach ($protected as $protectedPath => $role) {
        if (strpos($path, $protectedPath) !== FALSE && !$app['security']->isGranted($role)) {
            throw new AccessDeniedException();
        }
    }
});

return $app;
