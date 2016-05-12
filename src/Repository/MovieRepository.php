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
        $sqlQuery->select('*')->from($this->tableName)->where('title LIKE ?');
        $sqlQuery->setParameter(1, '%' . $title . '%');
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
        $query = 'SELECT DISTINCT movies.* FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id
                    LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id';

        return $this->loadWithConditions($query, $conditions);
    }

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return MovieEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $entity = new MovieEntity();
        $entity->setPropertiesFromArray($properties);

        // get the genres for this movie
        $query = "SELECT name as genre FROM movies JOIN movie_to_genres ON movie_to_genres.movie_id = movies.id JOIN genres ON genre_id = genres.id WHERE movie_id = ?";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $properties['id']);
        $statement->execute();
        $genres = $statement->fetchAll();
        $entity->setGenres($genres);
        return $entity;
    }

}
