<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'login' => array(
            'pattern' => '^/',
            'form' => array(
                'login_path' => '/auth/login',
                'check_path' => '/auth/dologin',
                'default_target_path' => '/auth/redirect',
                'username_parameter' => 'email',
                'password_parameter' => 'password',
            ),
            'logout' => true,
            'anonymous' => true,
            'users' => $app->share(function () use ($app) {
                return $app['repository_factory']->create('user');
            }),
        ),
    ),
    'security.role_hierarchy' => array(
        'ROLE_ADMIN' => array('ROLE_USER'),
    ),
    'security.access_rules' => array(
        array('^/admin', 'ROLE_ADMIN'),
        array('^/user', 'ROLE_USER'),
    ),
));

// Save the url before accesing login page
$app->before(function (Request $request) use ($app) {
    $path = $request->getPathInfo();
    if (strpos($path, '/auth/login') !== FALSE) {
        $pastUrl = $request->headers->get('referer');
        $app['session']->set('before_login_location', $pastUrl);
    }
});