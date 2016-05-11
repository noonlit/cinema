<?php

namespace Repository;

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
     * example $conditions = array('genre' = 'all', 'year' = 'all', 'date' => 'all', 'time' => 'all', sort = 'title')
     */
    
    public function searchMoviesWhere(array $conditions)
    {
        $entities = array();
        
        // the basic query 
        /*$query = 'SELECT schedules.id AS primary_id, schedules.date, schedules.time, movies.*, movie_to_genres.*, genres.name 
                    FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id 
                    LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id 
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id'*/
        
       $sqlQuery = $this->dbConnection->createQueryBuilder();
       $sqlQuery->select('schedules.id AS primary_id, schedules.date, schedules.time, movies.*, movie_to_genres.*, genres.name')->from('schedules');
       $sqlQuery->leftJoin('movies');
       $statement = $sqlQuery->execute();
       $entitiesAsArrays = $statement->fetchAll();
       return $entitiesAsArrays;
    }
    

    
    /**
     * example filter 
     * 
     * SELECT * FROM (SELECT * FROM (SELECT schedules.id AS primary_id, schedules.date, schedules.time, movies.*, movie_to_genres.*, genres.name FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id LEFT JOIN genres ON movie_to_genres.genre_id = genres.id) AS base_table) AS result WHERE year = '1996' AND date = '2016-05-08' AND name = 'SF'
     */
    
    /**
     * by genre
     * 
     * SELECT id, title, year, cast, duration, poster, link_imdb FROM (SELECT schedules.id AS primary_id, movies.*, movie_to_genres.*, genres.name FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id LEFT JOIN genres ON movie_to_genres.genre_id = genres.id WHERE genres.name = 'Action') AS result
     */
    
    /**
     * by genre and year
     * 
     * SELECT * FROM (SELECT id, title, year, cast, duration, poster, link_imdb FROM (SELECT schedules.id AS primary_id, movies.*, movie_to_genres.*, genres.name FROM schedules LEFT JOIN movies ON schedules.movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id LEFT JOIN genres ON movie_to_genres.genre_id = genres.id WHERE genres.name = 'Action') AS result) AS final_result WHERE year = '1996'
     */

    /**
     * Converts properties array to \Entity\Movie object.
     *
     * @param array $properties
     * @return MovieEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $movie = new Entity\MovieEntity($properties);
        $validator = new \Entity\MovieValidator();
        $validator->validate($movie);
        return $movie;
    }

}
