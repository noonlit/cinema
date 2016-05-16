<?php

return [
    'homepage_filters' => [
        'genres' => [
            '1' => 'Comedy', 
            '2' => 'Action', 
            '3' => 'Drama', 
            '4' => 'SF', 
            '5' => 'Thriller', 
            '6' => 'Horror', 
            '7' => 'Adventure', 
            '8' => 'Fantasy'
            ],
        'sortable_by' =>  [
            'Title',
            'Release year',
            'Date',
            'Time'
        ],
        'sort_flag' => [
            'asc' => 'Ascending',
            'desc' => 'Descending'
        ],
        'per_page' => [100, 16, 24] // temporary 100, is meant to be 8
    ]
];