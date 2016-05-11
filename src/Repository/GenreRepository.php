<?php

namespace Repository;

use Entity\GenreEntity;

class GenreRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\Genre object.
     *
     * @param array $properties
     * @return GenreEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        return new GenreEntity($properties);
    }
    
    public function loadByMovieId($movieId)
    {
        $query = "SELECT name FROM (SELECT movies.id, movie_to_genres.movie_id, movie_to_genres.genre_id, genres.name FROM movies LEFT JOIN movie_to_genres ON movie_to_genres.movie_id = movies.id LEFT JOIN genres ON genre_id = genres.id WHERE movie_id = 1) AS result"
    }

}
