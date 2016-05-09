<?php

return [
    [
        'name' => 'homepage',
        'route' => '/',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Main',
        'action' => 'index'
    ],
    [
        'name' => 'show_register_page',
        'route' => '/auth/register',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Auth',
        'action' => 'showRegister'
    ],
    [
        'name' => 'handle_register',
        'route' => '/auth/doregister',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Auth',
        'action' => 'doRegister'
    ],
    [
        'name' => 'show_profile',
        'route' => '/user/profile',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'User',
        'action' => 'showProfile'
    ],
    [
        'name' => 'logout',
        'route' => '/auth/logout',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Auth',
        'action' => 'doLogout'
    ],
    [
        'name' => 'show_login_page',
        'route' => '/auth/login',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Auth',
        'action' => 'showLogin'
    ],
    [
        'name' => 'handle_login',
        'route' => '/auth/dologin',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Auth',
        'action' => 'doLogin'
    ],
    [
        'name' => 'admin_set_genre',
        'route' => '/admin/genre',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'GenreController',
        'action' => 'setGenre'
    ]
];
