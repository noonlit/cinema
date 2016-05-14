<?php

namespace Repository;

use Entity\MovieEntity;
use Framework\Validator\MovieValidator;
use Entity\AbstractEntity;

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
        /* $sqlQuery = $this->dbConnection->createQueryBuilder();
          $sqlQuery->select('*')->from($this->tableName)->where('title LIKE ?');
          $sqlQuery->setParameter(1, '%' . $title . '%');
          $statement = $sqlQuery->execute();
          $entitiesAsArrays = $statement->fetchAll();
          $entities = $this->loadEntitiesFromArrays($entitiesAsArrays);
          return $entities; */
    }

    public function loadCurrentMovieData(array $conditions)
    {
        // the basic query
        $query = "SELECT * FROM (SELECT movies.id, movies.title, movies.year, movies.poster, date, time, GROUP_CONCAT(genres.name) AS genres FROM schedules 
                    LEFT JOIN movies ON movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id 
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id GROUP BY id HAVING TIMESTAMP(date, time) > CURRENT_TIMESTAMP) 
                AS result";

        return $this->runQueryWithConditions($query, $conditions);
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
        $genresName = [];
        foreach ($genres as $result) {
            $genresName[] = $result['genre'];
        }
        $entity->setGenres($genresName);
        return $entity;
    }

    protected function loadArrayFromEntity(AbstractEntity $entity)
    {
        $entityToArray = $entity->toArray();
        unset($entityToArray['genres']);
        return $entityToArray;
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
