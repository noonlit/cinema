<?php

namespace Repository;

use Entity\MovieEntity;
use Entity\AbstractEntity;

class MovieRepository extends AbstractRepository
{

    /**
     * @param array $conditions
     * @return string
     */
    public function buildFilteredMovieQuery(array $conditions)
    {
        // build the query. final result should be of movie entities, so only return the relevant entity data
        $beginning = " SELECT id, title, year, cast, duration, poster, link_imdb, search_title FROM (";
        $end = ") AS result ";

        // basic query
        $select = " SELECT movies.*, date, time";
        $from = " FROM ";

        // if the user specified a title, try matching it
        if (isset($conditions['match'])) {
            $from .= "(SELECT * FROM movies WHERE MATCH (title, search_title) AGAINST (:match IN BOOLEAN MODE)) AS ";
        }

        $from .= " movies ";

        $join = ' LEFT JOIN schedules ON movie_id = movies.id LEFT JOIN movie_to_genres ON movies.id = movie_to_genres.movie_id
                    LEFT JOIN genres ON movie_to_genres.genre_id = genres.id ';
        $groupBy = ' GROUP BY movies.id ';
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

                    if (strcasecmp($value, 'descending') == 0) {
                        $value = 'DESC';
                    } else {
                        $value = 'ASC';
                    }

                    // let's make sure the key is fine, i.e. alphabet chars, dash, underscore, period
                    $key = preg_replace('/[^A-Za-z-_.]/', '', $key);
                    $sort .= " {$key} {$value} ";
                }
            }

            // make sure you unset this, as you can't bind to it
            unset($conditions['sort']);
        }

        // build the between
        $between = '';
        if (isset($conditions['between'])) {
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

        $query = "{$beginning}{$select}{$from}{$join}{$where}{$between}{$groupBy}{$having}{$sort}{$end}";
        return $query;
    }

    /**
     * @param array $conditions
     * @return \Entity\MovieEntity[]
     */
    public function loadFilteredMovies(array $conditions)
    {
        $query = $this->buildFilteredMovieQuery($conditions);

        // add the pagination
        $pagination = '';
        if (isset($conditions['pagination'])) {
            $pagination .= ' LIMIT :limit OFFSET :offset';
        }

        // run the query
        $query .= "{$pagination}";
        $moviesAsArrays = $this->runQueryWithNamedParams($query, $conditions);
        $movies = $this->loadEntitiesFromArrays($moviesAsArrays);
        return $movies;
    }

    /**
     * @param array $conditions
     * @return int
     */
    public function getFilteredMovieCount(array $conditions)
    {
        $query = "SELECT COUNT(*) AS count FROM ({$this->buildFilteredMovieQuery($conditions)}) AS row_count";
        $queryResult = $this->runQueryWithNamedParams($query, $conditions);
        $count = $queryResult[0]['count'];
        return (int) $count;
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

    /**
     * @param AbstractEntity $entity
     * @return array
     */
    public function loadArrayFromEntity(AbstractEntity $entity)
    {
        $entityToArray = $entity->toArray();

        //sanitize the title for the search
        $title = $entity->getTitle();
        $searchTitle = strtolower($title);
        $cleanSearchTitle = preg_replace('/[^\pL\p{Nd}\p{Zs}]/u', "", $searchTitle);
        $entityToArray['search_title'] = $cleanSearchTitle;
        unset($entityToArray['genres']);
        return $entityToArray;
    }

    /**
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
