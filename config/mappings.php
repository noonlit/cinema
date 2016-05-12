<?php

return [
    'routes' => require __DIR__ . '/../config/routes.php',
    'repositories' => [
        'user' => [
            'repository' => 'Repository\UserRepository',
            'db_table' => 'users'
        ],
        'movie' => [
            'repository' => 'Repository\MovieRepository',
            'db_table' => 'movies'
        ],
        'room' => [
            'repository' => 'Repository\RoomRepository',
            'db_table' => 'rooms'
        ],
        'schedule' => [
            'repository' => 'Repository\SchdeuleRepository',
            'db_table' => 'schedules'
        ],
    ]
];


