<?php

namespace Repository;
use Entity\MovieEntity;
use Entity\MovieValidator;

class MovieRepository extends AbstractRepository
{

    /**
     * Searches for movies by title.
     * 
     * @param string $title 
     * @return MovieEntity[]
     */
    public function searchMoviesByTitle($title)
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

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return MovieEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $movie = new MovieEntity($properties);
        $validator = new MovieValidator();
        $validator->validate($movie);
        return $movie;
    }

}
