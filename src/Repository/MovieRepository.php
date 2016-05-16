<?php

namespace Repository;
use Entity\MovieEntity;
use Framework\Validator\MovieValidator;

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

    /**
     * Gets current movies.
     *
     * @param array $conditions
     * @return MovieEntity[]
     */
    public function loadCurrentMovies(array $conditions)
    {
        // the basic query
        $query = "SELECT id, title, year, cast, duration, poster, link_imdb FROM (SELECT movies.*, date, time FROM schedules
                    LEFT JOIN movies ON movie_id = movies.id HAVING TIMESTAMP(date, time) > CURRENT_TIMESTAMP) AS result";

        return $this->loadWithConditions($query, $conditions);
    }

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return MovieEntity
     */
    protected function loadEntityFromArray(array $properties)
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

    public function loadArrayFromEntity(MovieEntity $entity) {
        $entityToArray = $entity->toArray();
        unset($entityToArray['genres']);
    }
}
