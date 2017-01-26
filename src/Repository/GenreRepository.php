<?php

namespace Repository;

use Entity\GenreEntity;

class GenreRepository extends AbstractRepository
{

    /**
     * Converts properties array to \Entity\Genre object.
     *
     * @param array $properties
     *
     * @return GenreEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        $entity = new GenreEntity();
        $entity->setPropertiesFromArray($properties);

        return $entity;
    }

    /**
     * @param int $movieId
     *
     * @return \Entity\GenreEntity[]
     */
    public function loadByMovieId($movieId)
    {
        $query
            = "SELECT name FROM 
                  (SELECT movies.id, movie_to_genres.movie_id, movie_to_genres.genre_id, genres.name FROM movies 
                  LEFT JOIN movie_to_genres ON movie_to_genres.movie_id = movies.id LEFT JOIN genres ON genre_id = genres.id 
                  WHERE movie_id = ?) AS result";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $movieId);
        $statement->execute();

        $genresNameList = $statement->fetchAll();
        $genresEntities = [];

        foreach ($genresNameList as $key => $genreName) {
            $genres = $this->loadByProperties(['name' => $genreName['name']]);
            if (empty($genres) == false) {
                $genresEntities[] = reset($genres);
            }
        }

        return $genresEntities;
    }

    public function checkGenreIsUsed($genreId)
    {
        $query = "SELECT * FROM movie_to_genres WHERE genre_id={$genreId}";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        $genreArray = $statement->fetchAll();
        if (empty($genreArray)) {
            return false;
        }

        return true;

    }

}
