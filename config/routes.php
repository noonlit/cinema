<?php

return [
    [
        'name' => 'homepage',
        'route' => '/',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Main',
        'action' => 'showMovies'
    ],
    [
        'name' => 'filter',
        'route' => '/filter',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Main',
        'action' => 'loadFilteredMovies'
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
        'route' => 'user/auth/logout',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Auth',
        'action' => 'logout'
    ],
    [
        'name' => 'login',
        'route' => 'auth/login',
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
        'name' => 'admin_user_change_status',
        'route' => '/admin/users/changeStatus/{id}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Admin',
        'action' => 'changeStatus'
    ],
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
        'route' => '/admin/genre/edit/{id}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Genre',
        'action' => 'editGenre'
    ],
    [
        'name' => 'admin_genre_delete',
        'route' => '/admin/genre/delete/{id}',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Genre',
        'action' => 'deleteGenre'
    ],
    [
        'name' => 'admin_genre_edit',
        'route' => '/admin/genre/edit/{id}',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Genre',
        'action' => 'editGenre'
    ],    
    [
        'name' => 'admin_movie_edit',
        'route' => '/admin/movie/edit/{id}',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Movie',
        'action' => 'editMovie'
    ],
    [
        'name' => 'show_movie',
        'route' => '/movie/{title}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Movie',
        'action' => 'showMovie'
    ],
    [
        'name' => 'admin_movie_add',
        'route' => '/admin/movie/add',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Movie',
        'action' => 'addMovie'
    ],
    [
        'name' => 'handle_booking',
        'route' => '/user/movie/{title}/booking',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Booking',
        'action' => 'addBooking'
    ],
    [
        'name' => 'login_success_redirect',
        'route' => '/user/auth/redirect',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Auth',
        'action' => 'onLoginSuccessRedirect'
    ],   
    [
        'name' => 'admin_room_add',
        'route' => '/admin/rooms/add',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Room',
        'action' => 'addRoom'
    ],
    [
        'name' => 'admin_room_edit',
        'route' => '/admin/rooms/edit/{id}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Room',
        'action' => 'editRoom'
    ],
    [
        'name'=>'admin_room_delete',
        'route'=> '/admin/rooms/delete/{id}',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Room',
        'action' => 'deleteRoom'
    ],
    [
        'name' => 'admin_show_schedule_page',
        'route' => '/admin/schedule',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Schedule',
        'action' => 'showSchedule'
    ],
    [
        'name' => 'admin_handle_schedule',
        'route' => '/admin/doschedule',
        'method' => Framework\Initializer\Controller::METHOD_POST,
        'controller' => 'Schedule',
        'action' => 'addSchedule'
    ],
    [
        'name' => 'admin_show_schedule_list',
        'route' => '/admin/schedules',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Schedule',
        'action' => 'listSchedules'
    ],
    [
        'name' => 'admin_get_date_schedule',
        'route' => '/admin/schedules/date/{date_id}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Schedule',
        'action' => 'getDateSchedule',
    ],
    [
        'name' => 'admin_show_all_users_paginated',
        'route' => '/admin/users/',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Admin',
        'action' => 'showUserList'
    ],
    [
        'name' => 'admin_show_scheduled_movies_paginated',
        'route' => '/admin/scheduled_movies',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Schedule',
        'action' => 'showScheduledMovies'
    ],
    [
        'name' => 'admin_remove_user',
        'route' => '/admin/user/remove/{id}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Admin',
        'action' => 'removeUser'
    ],
    [
        'name' => 'admin_movie_income',
        'route' => '/admin/movie/{id}/income',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Movie',
        'action' => 'computeIncome'
    ],
    [
        'name' => 'admin_show_occupancy',
        'route' => '/admin/occupancy',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Occupancy',
        'action' => 'indexOccupancy',
    ],
    [
        'name' => 'admin_query_occupancy',
        'route' => '/admin/occupancy/level',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Occupancy',
        'action' => 'queryOccupancy',
    ],
    [
        'name' => 'admin_show_occupancy_results',
        'route' => '/admin/occupancy/results',
        'method' => Framework\Initializer\Controller::METHOD_GET,
        'controller' => 'Occupancy',
        'action' => 'resultsOccupancy',
    ],
    [
        'name' => 'admin_occupancy_route_error',
        'route' => '/admin/occupancy/{url}',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Occupancy',
        'action' => 'redirectOccupancy',
    ],
    [
        'name' => 'admin_get_room_schedule',
        'route' => '/admin/occupancy/room/{id}/schedule',
        'method' => Framework\Initializer\Controller::METHOD_MATCH,
        'controller' => 'Occupancy',
        'action' => 'getRoomSchedule',
    ],
];
