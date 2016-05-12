<?php

namespace Repository;
use Entity\MovieEntity;
use Framework\Validator\MovieValidator;

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

    /**
     * 
     * @param \Entity\MovieEntity $movie
     * @param array $genresIds
     * @return int the number of the afected rows
     */
    public function setMovieGenres(\Entity\MovieEntity $movie, array $genresIds)
    {
        $affectedRows = 0;
        $row = array(
            'movie_id' => $movie->getId(),
            'genre_id' => null,
        );
        foreach ($genresIds as $genreId) {
            $row['genre_id'] = $genreId;
            $affectedRows += $this->dbConnection->insert('movie_to_genres', $row);
        }
        return $affectedRows;
    }
    
}
