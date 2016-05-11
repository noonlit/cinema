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
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Auth',
        'action' => 'logout'
    ],
    [
        'name' => 'login',
        'route' => '/auth/login',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Auth',
        'action' => 'showLogin'
    ],
    [
        'name' => 'auth_dologin',
        'route' => '/auth/dologin',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
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
        'name' => 'user_status',
        'route' => '/admin/userStatus',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Admin',
        'action' => 'changeStatus'],
    [
        'name' => 'show_paginated',
        'route' => '/movie/paginated',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Movie',
        'action' => 'showPaginated'
    ],
         [
        'name' => 'admin_room_show_all',
        'route' => '/admin/rooms/all',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Room',
        'action' => 'showAllRooms'
	],
    [
        'name' => 'admin_genre_show_all',
        'route' => '/admin/genre/all',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Genre',
        'action' => 'showGenreList'
    ],
    [
        'name' => 'admin_genre_add',
        'route' => '/admin/genre/add',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Genre',
        'action' => 'addGenre'
    ],
[
        'name' => 'admin_genre_edit',
        'route' => '/admin/genre/edit/{id}/{value}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Genre',
        'action' => 'editGenre'
    ],    
    [
        'name' => 'show_movie',
        'route' => '/movie/{title}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Movie',
        'action' => 'showMovie'
    ],
    [
        'name' => 'handle_booking',
        'route' => '/user/profile',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'User',
        'action' => 'showProfile'
    ],
    [
        'name' => 'login_success_redirect',
        'route' => '/auth/redirect',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Auth',
        'action' => 'onLoginSuccessRedirect'
    ],   
    [
        'name' => 'admin_room_add',
        'route' => '/admin/room/add',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Room',
        'action' => 'addRoom'
    ]
];
