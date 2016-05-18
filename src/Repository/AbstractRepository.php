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
        // temp fix: check DateTime format
        foreach ($entityAsArray as $field => $value) {
            if ($field === 'date' && is_object($value)) {
                $entityAsArray[$field] = $value->format('Y-m-d');
            }
            
            if ($field === 'time' && !empty($value)) {
                $value .= ':00:00';
                $entityAsArray[$field] = $value;
            }
        }
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
        $entitiesAsArrays = $this->runQueryWithConditions($query);
        $entities = $this->loadEntitiesFromArrays($entitiesAsArrays);
        return $entities;
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
        $entities = $this->loadEntitiesFromArrays($entitiesAsArrays);
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
        $entitiesAsArrays = $this->runQueryWithConditions($query, array('pagination' => array('page' => $page, 'per_page' => $perPage), $sort));
        $entities = $this->loadEntitiesFromArrays($entitiesAsArrays);
        return $entities;
    }

    /**
     * Gets the row count of the database table.
     * 
     * @return int
     */
    public function getRowsCount()
    {
        $query = $this->dbConnection->createQueryBuilder();
        $query->select('COUNT(*) as count')->from($this->tableName);
        
        $statement = $query->execute();
        $result = $statement->fetch();
        return (int)$result['count'];
    }

    /**
     * Gets the max value in a column of the database table.
     * 
     * @param string $columnName
     * @return int
     */
    public function getMaxValue($columnName)
    {
        $query = $this->dbConnection->createQueryBuilder();
        $query->select("MAX({$columnName}) as max")->from($this->tableName);
        $statement = $query->execute();
        $result = $statement->fetch();
        return (int)$result["max"];
    }

    /**
     * Gets the name of the database table that stores the corresponding entities.
     *
     * @return string
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
        return (int)($perPage);
    }

    /**
     * Retrieves an (optionally filtered +/- within a range +/- grouped +/- paginated) array of results.
     * 
     * @param string $query The SQL query
     * @param array $conditions The filters/range/group/pagination
     * @return array
     */
    protected function runQueryWithConditions($query, array $conditions = array())
    {
        // filtering - by default, none
        $filters = null;
        if (isset($conditions['filters'])) {
            // save filters that are not set to 'all' and are not empty
            $filters = array_filter($conditions['filters'], function($value) {
                return $value != 'all' && !empty($value);
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

        // betweens - by default, none
        $betweens = null;
        if (isset($conditions['between'])) {
            $betweens = $conditions['between'];
            if (count($betweens) > 0) {
                $isFirst = true;
                foreach ($betweens as $key => $value) {
                    if ($isFirst) {
                        $query .= ' WHERE ';
                    } else {
                        $query .= ' AND ';
                    }

                    $query .= " {$key} BETWEEN ? AND ? ";
                    $isFirst = false;
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
                    $query .= preg_replace('/[^A-Za-z-_.]/', '', $group);
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

        // bind betweens
        if (!is_null($betweens)) {
            foreach ($betweens as $between) {
                $statement->bindValue($paramIndex++, $between[0]);
                $statement->bindValue($paramIndex++, $between[1]);
            }
        }

        // bind group bys
        if (!is_null($groups)) {
            foreach ($groups as $group) {
                $statement->bindValue($paramIndex++, $group);
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
        $result = $statement->fetchAll();

        return $result;
    }

    /**
     * Runs an query with named parameters.
     *
     * @param string $query The SQL query
     * @param array $params The parameters - key is name, ... value is value
     * @return array
     */
    public function runQueryWithNamedParams($query, array $params)
    {
        $statement = $this->dbConnection->prepare($query);

        // bind paginate, if any
        if (isset($params['pagination'])) {
            $limit = $this->getLimit($params['pagination']['per_page']);
            $offset = $this->getOffset($params['pagination']['page'], $params['pagination']['per_page']);
            $statement->bindValue('limit', $limit, \PDO::PARAM_INT);
            $statement->bindValue('offset', $offset, \PDO::PARAM_INT);
        }

        // bind the filters, if any
        if (isset($params['filters'])) {

            $filters = $params['filters'];
            foreach ($filters as $key => $value) {
                $statement->bindValue($key, $value);
            }
        }

        // bind the betweens, if any
        if (isset($params['between'])) {

            $betweens = $params['between'];
            foreach ($betweens as $key => $value) {
                foreach ($value as $delimiter => $delimiterValue) {
                    $statement->bindValue($delimiter, $delimiterValue);
                }
            }
        }
        
        // bind the match, if any
        if(isset($params['match'])) {
            $match = trim(strtolower($params['match']));

            $matchString = '';
            $matchWords = explode(' ', $match);
            foreach($matchWords as $matchWord) {
                $matchString .= $matchWord . '*'; 
            }

            $statement->bindValue('match', $matchString);
        }

        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /**
     * Converts entity properties to associative array.
     *
     * @param AbstractEntity $entity
     * @return array
     */
    public function loadArrayFromEntity(AbstractEntity $entity)
    {
        return $entity->toArray();
    }

    /**
     * Converts associative arrays to entities.
     *
     * @param array $entitiesAsArrays
     * @return AbstractEntity[]
     */
    protected function loadEntitiesFromArrays(array $entitiesAsArrays)
    {
        if (empty($entitiesAsArrays)) {
            return array();
        }

        $entities = array();

        foreach ($entitiesAsArrays as $entity) {
            $entities[] = $this->loadEntityFromArray($entity);
        }

        return $entities;
    }

    /**
     * Converts associative array to entity properties.
     *
     * @param array An associative array
     * @return null|object Null if something goes wrong, an object otherwise
     */
    abstract protected function loadEntityFromArray(array $properties);
}
