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
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Auth',
        'action' => 'register'
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
        'action' => 'logout'
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
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Auth',
        'action' => 'login'
    ],
    [
        'name' => 'test_secured_routes',
        'route' => '/admin/smth',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Main',
        'action' => 'index'
    ],
    [
        'name' => 'test_secured_params',
        'route' => '/admin/smth/{ceva}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Main',
        'action' => 'index'
    ],
    [
        'name' => 'show_paginated',
        'route' => '/movies/paginated',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Movie',
        'action' => 'showPaginated'
    ],
    [
        'name' => 'show_genre_page',
        'route' => '/admin/genrePage',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Genre',
        'action' => 'showGenre'
    ],
    [
        'name' => 'show_genre',
        'route' => '/admin/genre',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Genre',
        'action' => 'showGenreList'
    ]
];
