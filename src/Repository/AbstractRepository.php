<?php

namespace Repository;

use Doctrine\DBAL\Connection;
use Entity\AbstractEntity;

/**
 * Provides basic CRUD functionality.
 */
abstract class AbstractRepository
{

    /**
     * @var Connection
     */
    protected $dbConnection;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * The constructor.
     *
     * @param Connection $dbConnection PDO wrapper with extra functions
     * @param string $tableName The table to query
     */
    public function __construct(Connection $dbConnection, $tableName)
    {
        $this->dbConnection = $dbConnection;
        $this->tableName = $tableName;
    }

    /**
     * Stores entity data in the database.
     *
     * @param AbstractEntity $entity The entity
     * @return int Number of affected rows
     */
    public function save(AbstractEntity $entity)
    {
        // ! concrete repos should decide when/if not to allow updates/inserts. by default, if it has an id, we update, otherwise insert.
        if (!is_null($entity->getId())) {
            return $this->update($entity);
        }
        return $this->insert($entity);
    }

    /**
     * Inserts an entity's data in the database.
     *
     * @param AbstractEntity $entity The entity
     * @return int Number of affected rows
     */
    protected function insert(AbstractEntity $entity)
    {
        $entityAsArray = $this->loadArrayFromEntity($entity);
        return $this->dbConnection->insert($this->tableName, $entityAsArray);
    }

    /**
     * Updates an entity's data in the database.
     *
     * @param AbstractEntity $entity The entity
     * @return int Number of affected rows
     */
    protected function update(AbstractEntity $entity)
    {
        $id = $entity->getId();
        $entityAsArray = $this->loadArrayFromEntity($entity);
        return $this->dbConnection->update($this->tableName, $entityAsArray, array('id' => $id));
    }

    /**
     * Deletes an entity from the database.
     *
     * @param AbstractEntity $entity The entity
     * @return int Number of affected rows
     */
    public function delete(AbstractEntity $entity)
    {
        $id = $entity->getId();
        return $this->deleteByProperties(array("id" => $id));
    }

    /**
     * Deletes entities from the database by their properties.
     *
     * @param array $properties Column names as keys, ... values as values
     * @return int Number of affected rows
     */
    public function deleteByProperties(array $properties)
    {
        $query = $this->dbConnection->createQueryBuilder();
        $query->delete($this->tableName);

        // we need to keep track of iterations to use the where method properly
        $i = 0;
        foreach ($properties as $key => $value) {
            if ($i == 0) {
                $query->where("{$key} = ?");
            } else {
                $query->andWhere("{$key} = ?");
            }

            $query->setParameter($i, $value);

            $i++;
        }

        $statement = $query->execute();

        return $statement;
    }

    /**
     * Retrieves all the entities from their specific database table.
     *
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadAll()
    {
        $query = "SELECT * FROM {$this->tableName}";
        return $this->loadWithConditions($query);
    }

    /**
     * Retrieves entities from their specific table by custom properties.
     *
     * @param array $properties Column names as keys, ... values as values
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadByProperties(array $properties)
    {
        $entities = array();
        $query = $this->dbConnection->createQueryBuilder();
        $query->select('*')->from($this->tableName);
        // we need to keep track of iterations to use the where method properly
        $i = 0;
        foreach ($properties as $key => $value) {
            if ($i == 0) {
                $query->where("{$key} = ?");
            } else {
                $query->andWhere("{$key} = ?");
            }
            $query->setParameter($i, $value);
            $i++;
        }
        $statement = $query->execute();
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
     * Retrieves an (optionally ordered) subset of entities.
     *
     * @param int $page
     * @param int $perPage
     * @param array $sort Optional - column names as keys, order flags as values
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadPage($page, $perPage, array $sort = array())
    {
        $query = "SELECT * FROM {$this->tableName}";
        return $this->loadWithConditions($query, array('pagination' => array('page' => $page, 'per_page' => $perPage), $sort));
    }

    /**
     * Gets the name of the database table that stores the corresponding entities.
     *
     * @return string The name of the table
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Helper for pagination - makes sure the offset is a reasonable value.
     *
     * @param int $page
     * @param int $perPage
     * @return int A sane offset
     */
    protected function getOffset($page, $perPage)
    {
        // sanity check: did someone manually enter a stupid value?
        if (!is_numeric($page) || $page < 1) {
            $page = 1;
        }
        // page count is not zero-based
        $offset = $page - 1;
        // sanity check: is the offset negative? (if it's a non-negative stupid value, it's fine, we'll just get an empty result set back)
        if ($offset <= 0) {
            return 0;
        }
        // if this isn't the first page, calculate where to set the initial offset
        $limit = $this->getLimit($perPage);
        return $offset * $limit;
    }

    /**
     * Another helper for pagination - makes sure the limit is a reasonable value.
     *
     * @param int $perPage
     * @return int A sane limit
     */
    protected function getLimit($perPage)
    {
        if (!is_numeric($perPage) || $perPage < 0) {
            return 0;
        }
        return intval($perPage);
    }

    /**
     * Retrieves an (optionally filtered +/- grouped +/- sorted +/- paginated) array of entities.
     *
     * @return array|BookingRepository[]|GenreRepository[]|MovieRepository[]|RoomRepository[]|ScheduleRepository[]|UserRepository[]
     */
    protected function loadWithConditions($query, array $conditions = array())
    {
        $entities = array();

        // filtering - by default, none
        $filters = null;
        if (isset($conditions['filters'])) {
            // save filters that are not set to 'all'
            $filters = array_filter($conditions['filters'], function($value) {
                return $value != 'all';
            });

            // if we have any, append to query
            if (count($filters) > 0) {
                $query .= ' WHERE ';
                $isFirst = true;
                foreach ($filters as $key => $value) {
                    if (!$isFirst) {
                        $query .= ' AND ';
                    }
                    $isFirst = false;
                    $query .= "{$key} = ?";
                }
            }
        }

        // group bys - by default, none
        $groups = null;
        if (isset($conditions['group_by'])) {
            $groups = $conditions['group_by'];
            if (count($groups) > 0) {
                $query .= ' GROUP BY ';
                $isFirst = true;
                foreach ($groups as $group) {
                    if (!$isFirst) {
                        $query .= ', ';
                    }
                    $isFirst = false;
                    $query .= ' ? ';
                }
            }
        }
        // sorts - by default, none
        $sorts = null;
        if (isset($conditions['sort'])) {
            $sorts = $conditions['sort'];
            if (count($sorts) > 0) {
                $query .= ' ORDER BY ';
                $isFirst = true;
                foreach ($sorts as $sort) {
                    if (!$isFirst) {
                        $query .= ', ';
                    }
                    $isFirst = false;
                    $query .= ' ? ? ';
                }
            }
        }
        // pagination - by default, none
        $pagination = null;
        if (isset($conditions['pagination'])) {
            $pagination = $conditions['pagination'];
            $query .= ' LIMIT ? OFFSET ?';
        }
        // prepare
        $statement = $this->dbConnection->prepare($query);

        // keep track of which placeholder to replace
        $paramIndex = 1;

        // bind filters
        if (!is_null($filters)) {
            foreach ($filters as $filter) {
                $statement->bindValue($paramIndex++, $filter);
            }
        }

        // bind group bys
        if (!is_null($groups)) {
            foreach ($groups as $group) {
                $statement->bindValue($paramIndex++, $group);
            }
        }

        // bind sort
        if (!is_null($sorts)) {
            foreach ($sorts as $key => $value) {
                if (strcasecmp($value, 'desc') !== 0) {
                    $value = 'ASC';
                }
                $statement->bindValue($paramIndex++, $key);
                $statement->bindValue($paramIndex++, $value);
            }
        }

        // bind paginate
        if (!is_null($pagination)) {
            $limit = $this->getLimit($pagination['per_page']);
            $offset = $this->getOffset($pagination['page'], $pagination['per_page']);
            $statement->bindValue($paramIndex++, $limit, \PDO::PARAM_INT);
            $statement->bindValue($paramIndex++, $offset, \PDO::PARAM_INT);
        }

        $statement->execute();
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
     * Converts entity properties to associative array.
     *
     * @param AbstractEntity $entity
     * @return array
     */
    protected function loadArrayFromEntity(AbstractEntity $entity)
    {
        return $entity->toArray();
    }

    public function getMaxValue($columnName)
    {
        $query = $this->dbConnection->createQueryBuilder();
        $query->select("MAX({$columnName})")->from($this->tableName);
        $statement = $query->execute();
        $max = $statement->fetch();
        return $max["MAX({$columnName})"];
    }

    /**
     * Converts associative array to entity properties.
     *
     * @param array An associative array
     * @return null|object Null if something goes wrong, an object otherwise
     */
    abstract public function loadEntityFromArray(array $properties);
}
