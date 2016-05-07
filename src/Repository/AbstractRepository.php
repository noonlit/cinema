<?php

namespace Repository;

use Doctrine\DBAL\Connection;
use Entity\AbstractEntity;

/**
 * Provides basic CRUD functionality.
 *
 * @property Connection $dbConnection PDO wrapper with extra functions
 * @property string tableName The table to query
 */
abstract class AbstractRepository
{

    protected $dbConnection;
    protected $tableName;

    public function __construct(Connection $dbConnection, $tableName)
    {
        $this->dbConnection = $dbConnection;
        $this->tableName = $tableName;
    }

    /**
	 * Inserts an entity into the database.
	 *
	 * @param AbstractEntity $entity The entity
	 * @return int Number of affected rows
	 */
    public function save(AbstractEntity $entity)
    {
        /* ! each concrete repo should check if a row with their specific unique properties (like email or movie title) already exists
		 * if it does, decide if it wants to update the existing row or not allow insertion
		 * then use the parent functionality
		 */

		$entityAsArray = $this->loadArrayFromEntity($entity);
        return $this->dbConnection->insert($this->tableName, $entityAsArray);
    }

	/**
	 * Updates an entity.
	 *
	 * @param AbstractEntity $entity The entity
	 * @return int Number of affected rows
	 */
	public function update(AbstractEntity $entity)
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
        return $this->deleteById($id);
    }

	/**
	 * Deletes an entity from the database by its id.
	 *
	 * @param AbstractEntity $entity The entity
	 * @return int Number of affected rows
	 */
    public function deleteById($id) // tested, works
    {
		$sqlQuery = "DELETE FROM {$this->tableName} WHERE id = ?";
		$statement = $this->dbConnection->prepare($sqlQuery);
		$statement->bindValue(1, $id);
		$statement->execute();
		return $statement->rowCount();
    }

	/**
	 * Gets all the entities from their specific database table.
	 *
	 * @return array Empty if no results, array of objects otherwise
	 */
    public function loadAll() // tested, works
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
	 * Get an entity from its specific table by its id.
	 *
	 * @param int $id
	 * @return null|object Null if no results, an object otherwise
	 */
    public function loadById($id) // tested, works
    {
        // prepare the statement
		$sqlQuery = "SELECT * FROM {$this->tableName} WHERE id = ? LIMIT 1";
        $statement = $this->dbConnection->prepare($sqlQuery);
		$statement->bindValue(1, $id);
		$statement->execute();

		// fetch
		$entityAsArray = $statement->fetch();

		// no results?
		if (empty($entityAsArray)) {
			return null;
		}

		// return as object
		return $this->loadEntityFromArray($entityAsArray);
    }

	/**
	 * Get entities from their specific table by custom properties.
	 *
	 * @param array $properties Column names as keys, ... values as values
	 * @return array Empty if no results, array of objects otherwise
	 */

	public function loadByProperties(array $properties) // tested, works
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
		if(empty($entitiesAsArrays)) {
			return array();
		}

		// turn them into entities
        foreach ($entitiesAsArrays as $entity) {
            $entities[] = $this->loadEntityFromArray($entity);
        }

		return $entities;
	}

	/**
	 * Helper for the pagination methods - makes sure the offset is a reasonable value.
	 * 
	 * @param int $page 
	 * @param int $perPage 
	 * @return int A sane offset
	 */
	private function getOffset($page, $perPage)
	{
		// sanity check: did someone manually enter a stupid value?
		if ($page < 1) {
			$page = 1;
		}

		// page count is not zero-based
		$offset = $page - 1;

		// sanity check: is the offset negative? (if it's a non-negative stupid value, it's fine, we'll just get an empty result set back)
		if ($offset < 0) {
			$offset = 0;
		}

		// if this isn't the first page, calculate where to set the initial offset
		if ($offset > 0) {
			$offset = $offset * $perPage;
		}

		return $offset;
	}
	
	/**
	 * Another helper for the pagination methods - makes sure the limit is a reasonable value.
	 * 
	 * @param int $perPage 
	 * @return int A sane limit
	 */
	private function getLimit($perPage)
	{
		if ($perPage < 0) {
			$limit = 0;
		} else {
			$limit = $perPage;
		}

		return $limit;
	}

    /**
     * Gets a subset of entities.
	 * 
     * @param int $page 
     * @param int $perPage
	 * @return array Empty if no results, array of objects otherwise
     */
    public function loadPage($page, $perPage) // tested, works
    {
        $entities = array();
		$limit = $this->getLimit($perPage);
		$offset = $this->getOffset($page, $perPage);

		// get the entities
		$sqlQuery = "SELECT * FROM {$this->tableName} LIMIT ? OFFSET ?";
		$statement = $this->dbConnection->prepare($sqlQuery);
		$statement->bindValue(1, $limit, \PDO::PARAM_INT);
		$statement->bindValue(2, $offset, \PDO::PARAM_INT);
		$statement->execute();
		$entitiesAsArrays = $statement->fetchAll();

		// result is empty?
		if(empty($entitiesAsArrays)) {
			return array();
		}

		// turn them into entities
        foreach ($entitiesAsArrays as $entity) {
            $entities[] = $this->loadEntityFromArray($entity);
        }

        return $entities;
	}

	/**
	 * Gets an ordered subset of entities.
	 * 
	 * @param int $page 
	 * @param int $perPage 
	 * @param array $sort Column names as keys, order flags as values
	 * @return array Empty if no results, array of objects otherwise
	 */
	public function loadPageOrdered($page, $perPage, $sort) // tested, works
    {
		$entities = array();
		$limit = $this->getLimit($perPage);
		$offset = $this->getOffset($page, $perPage);

		// build the query
		$sqlQuery = $this->dbConnection->createQueryBuilder();
		$sqlQuery->select('*')->from($this->tableName);

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
		
		$sqlQuery->setFirstResult($offset)->setMaxResults($limit);
		$statement = $sqlQuery->execute();
		$entitiesAsArrays = $statement->fetchAll();

		// result is empty?
		if(empty($entitiesAsArrays)) {
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
