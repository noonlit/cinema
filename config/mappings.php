<?php
return [
    'routes' => require __DIR__ . '/../config/routes.php',
    'repositories' => [
        'user' => [
            'repository' => 'Repository\UserRepository',
            'db_table' => 'users'
        ],
        'genre' => [
            'repository' => 'Repository\GenreRepository',
            'db_table' => 'genres'
         ],
        'movie' => [
            'repository' => 'Repository\MovieRepository',
            'db_table' => 'movies'
        ],
        'schedule' => [
            'repository' => 'Repository\ScheduleRepository',
            'db_table' => 'schedules'
        ],
        'booking' => [
            'repository' => 'Repository\BookingRepository',
            'db_table' => 'bookings'
        ],
        'room' => [
            'repository' => 'Repository\RoomRepository',
            'db_table' => 'rooms'
        ]
    ]
];


