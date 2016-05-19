<?php

use Symfony\Component\HttpFoundation\Request;

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'form' => array(
                'login_path' => '/auth/login',
                'check_path' => '/auth/dologin', //auth_dologin route is automatically defined by Silex and its
                                                // name is derived from the check_path value (all / 
                                                // are replaced with _ and the leading / is stripped )
                'default_target_path' => 'login_success_redirect', //after a successfull login, the user is
                'always_use_default_target_path' => true,          //redirected to a last accesed page
                'username_parameter' => 'email', 
                'password_parameter' => 'password',
            ),
            'logout' => array('logout_path' => '/logout'), // route is automatically generated, based on the configured path
//            'logout' => true,
            'anonymous' => true,                           //annonymous users are allowed to access all pages
                                                           //except those wich path begin with /user or /admin
            'users' => $app->share(function () use ($app) {
                return $app['repository_factory']->create('user'); //providin the user repository 
            }),
        ),
    ),
    'security.role_hierarchy' => array(      //the administrator inherits user's rights
        'ROLE_ADMIN' => array('ROLE_USER'),
    ),
    'security.access_rules' => array(
        array('^/admin.*', 'ROLE_ADMIN'),   //in order to access paths that begin with /admin, the user must be administrator
        array('^/user.*', 'ROLE_USER'),    //in order to access paths that begin with /user, the user must be a regular user
    ),
));

//Saving the accessed path before login, so that the user can be 
//redirect to that page after succesfull login
$app->before(function (Request $request) use ($app) {
    $path = $request->getPathInfo();
    if (strpos($path, '/auth/login') !== FALSE) {
        $pastUrl = $request->headers->get('referer');
        $app['session']->set('before_login_location', $pastUrl);
    }
});