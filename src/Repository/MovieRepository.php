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
        // the basic query blocks
        $select = 'SELECT movies.*, date, time, GROUP_CONCAT(genres.name) AS genres';
        $from = ' FROM schedules ';
        $join = ' LEFT JOIN movies ON movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id ';
        $groupBy = ' GROUP BY id ';
        $having = ' HAVING TIMESTAMP(date, time) > CURRENT_TIMESTAMP ';

        // build the where
        $where = '';
        if (isset($conditions['filters'])) {
            // save filters that are not set to 'all' or empty
            $filters = array_filter($conditions['filters'], function($value) {
                return $value != 'all' && !empty($value);
            });

            if (count($filters) > 0) {
                $where .= ' WHERE ';
                $isFirst = true;
                foreach ($filters as $key => $value) {
                    if (!$isFirst) {
                        $where .= ' AND ';
                    }
                    $isFirst = false;
                    $where .= "{$key} = :{$key}";
                }
            }
        }

        // build the sort
        $sort = '';
        if (isset($conditions['sort'])) {
            $sorts = $conditions['sort'];
            if (count($sort) > 0) {
                $sort .= ' ORDER BY ';
                $isFirst = true;
                foreach ($sorts as $key => $value) {
                    if (!$isFirst) {
                        $sort .= ', ';
                    }
                    $isFirst = false;

                    if (strcasecmp($value, 'desc') == 0) {
                        $value = 'DESC';
                    } else {
                        $value = 'ASC';
                    }

                    $sort .= " {$key} {$value} ";
                }
            }

            // make sure you unset this, as you can't bind to it
            unset($conditions['sort']);
        }

        // build the between 
        $between = '';
        if(isset($conditions['between'])){
            $betweens = $conditions['between'];
            if (count($betweens) > 0) {
                $isFirst = true;
                foreach ($betweens as $key => $value) {
                    if ($isFirst && empty($where)) {
                        $between .= ' WHERE ';
                    } else {
                        $between .= ' AND ';
                    }

                    $between .= " {$key} BETWEEN ";

                    // get start and end 
                    $isAlsoFirst = true;
                    foreach ($value as $delimiter => $delimiterValue) {
                        if ($isAlsoFirst) {
                            $between .= " :{$delimiter} ";
                        } else {
                            $between .= " AND :{$delimiter} ";
                        }

                        $isAlsoFirst = false;
                    }

                    $isFirst = false;
                }
            }
        }

        // build the pagination
        $pagination = '';
        if (isset($conditions['pagination'])) {
            $pagination .= ' LIMIT :limit OFFSET :offset';
        }

        // run the query
        $query = "{$select}{$from}{$join}{$where}{$between}{$groupBy}{$having}{$sort}{$pagination}";
        return $this->runQueryWithNamedParams($query, $conditions);
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

    public function loadArrayFromEntity(AbstractEntity $entity)
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
