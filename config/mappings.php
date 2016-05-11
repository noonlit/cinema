<?php

return [
    'routes' => require __DIR__.'/../config/routes.php',
    'repositories' => [
        'user' => [
            'repository' => 'Repository\UserRepository',
            'db_table' => 'users'
        ],
        'movie' => [
            'repository' => 'Repository\MovieRepository',
            'db_table' => 'movies'
        ],
        'genre' => [
            'repository' => 'Repository\GenreRepository',
            'db_table' => 'genres'
        ]
    ]
];


