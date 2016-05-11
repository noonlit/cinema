<?php

namespace Repository;

use Entity\MovieEntity;

class MovieRepository extends AbstractRepository
{

    /**
     * Searches for movies by title.
     *
     * @param string $title
     * @return MovieEntity[]
     */
    public function loadMoviesByTitle($title) // refactor!
    {
        $entities = array();
        $sqlQuery = $this->dbConnection->createQueryBuilder();
        $sqlQuery->select('*')->from($this->tableName)->where('title LIKE :title');
        $sqlQuery->setParameter('title', '%' . $title . '%');
        $statement = $sqlQuery->execute();
        $entitiesAsArrays = $statement->fetchAll();

        // result is empty?
        if (empty($entitiesAsArrays)) {
            return array();
        }

        // turn them into entities
        foreach ($entitiesAsArrays as $entity) {
            $entities[] = $this->loadEntityFromArray($entity);
        }

        return $entities;
    }

    public function loadMovies(array $conditions)
    {
        // the basic query
        $query = 'SELECT movies.* FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id
                    LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id';

        return $this->runQueryWithConditions($query, $conditions);
    }

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return MovieEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $movie = new MovieEntity($properties);
        //$validator = new Framework\Validator\MovieValidator(); TO DO: fix this
        //$validator->validate($movie);
        return $movie;
    }

}
