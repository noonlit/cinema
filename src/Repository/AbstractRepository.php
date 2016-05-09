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
    private function insert(AbstractEntity $entity)
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
    private function update(AbstractEntity $entity)
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
        $sqlQuery = $this->dbConnection->createQueryBuilder();
        $sqlQuery->delete($this->tableName);
        
        // we need to keep track of iterations to use the where method properly
        $i = 0;

        foreach ($properties as $key => $value) {
            if ($i == 0) {
                $sqlQuery->where("{$key} = :{$key}");
                $sqlQuery->setParameter("{$key}", $value);
            } else {
                $sqlQuery->andWhere("{$key} = :{$key}");
                $sqlQuery->setParameter("{$key}", $value);
            }

            $i++;
        }
        
        $statement = $sqlQuery->execute();    
        return $statement;
    }

    /**
     * Gets all the entities from their specific database table.
     *
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadAll()
    {
        $entities = array();

        // fetch all rows
        $entitiesAsArrays = $this->dbConnection->fetchAll("SELECT * FROM {$this->tableName}");

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
     * Get entities from their specific table by custom properties.
     *
     * @param array $properties Column names as keys, ... values as values
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadByProperties(array $properties)
    {
        $entities = array();
        $sqlQuery = $this->dbConnection->createQueryBuilder();
        $sqlQuery->select('*')->from($this->tableName);

        // we need to keep track of iterations to use the where method properly
        $i = 0;

        foreach ($properties as $key => $value) {
            if ($i == 0) {
                $sqlQuery->where("{$key} = :{$key}");
                $sqlQuery->setParameter("{$key}", $value);
            } else {
                $sqlQuery->andWhere("{$key} = :{$key}");
                $sqlQuery->setParameter("{$key}", $value);
            }

            $i++;
        }

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
     * Helper for the pagination method - makes sure the offset is a reasonable value.
     *
     * @param int $page
     * @param int $perPage
     * @return int A sane offset
     */
    private function getOffset($page, $perPage)
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
     * Another helper for the pagination method - makes sure the limit is a reasonable value.
     *
     * @param int $perPage
     * @return int A sane limit
     */
    private function getLimit($perPage)
    {
        if (!is_numeric($perPage) || $perPage < 0) {
            return 0;
        }
        return $perPage;
    }

    /**
     * Gets a (potentially ordered) subset of entities.
     *
     * @param int $page
     * @param int $perPage
     * @param array $sort Optional - column names as keys, order flags as values
     * @return array Empty if no results, array of objects otherwise
     */
    public function loadPage($page, $perPage, array $sort = array())
    {
        $entities = array();
        $limit = $this->getLimit($perPage);
        $offset = $this->getOffset($page, $perPage);

        // build the query
        $sqlQuery = $this->dbConnection->createQueryBuilder();
        $sqlQuery->select('*')->from($this->tableName);

        if (!empty($sort)) {
            // we need to keep track of iterations to use the order by method properly
            $i = 0;

            foreach ($sort as $key => $value) {
                $column = $key;

                if (strcasecmp($value, 'desc') === 0) {
                    $order = 'DESC';
                } else {
                    $order = 'ASC';
                }

                if ($i == 0) {
                    $sqlQuery->orderBy($column, $order);
                } else {
                    $sqlQuery->addOrderBy($column, $order);
                }

                $i++;
            }
        }

        $sqlQuery->setFirstResult($offset)->setMaxResults($limit);
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
     * Gets the name of the database table that stores the corresponding entities.
     *
     * @return string The name of the table
     */
    public function getTableName()
    {
        return $this->tableName;
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

    /**
     * Converts associative array to entity properties.
     *
     * @param array An associative array
     * @return null|object Null if something goes wrong, an object otherwise
     */
    abstract protected function loadEntityFromArray(array $properties);
}
