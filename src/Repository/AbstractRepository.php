<?php

namespace Repository;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Connection as Connection;
use Entity\AbstractEntity;

/**
 * @property Connection $dbConnection database
 */
abstract class AbstractRepository // not sure it will turn out to be v abstract
{

    protected $dbConnection;
    protected $tableName;

    public function __construct(Connection $dbConnection, $tableName)
    {
        $this->dbConnection = $dbConnection;
        $this->tableName = $tableName;
    }
    
    public function save(AbstractEntity $entity)
    {
        $entityAsArray = $this->loadArrayFromEntity($entity);
        return $this->dbConnection->insert($this->tableName, $entityAsArray);
    }
    
    public function delete(AbstractEntity $entity)
    {
        $id = $entity->getId();
        return $this->deleteById($id);
    }
    
    public function deleteById($id)             
    {
        return $this->dbConnection->delete($this->tableName, array('id' => $id));
    }
    
    public function loadAll()
    {
        $entities = array();
        
        $entitiesAsArrays = $this->dbConnection->fetchAll("SELECT * FROM $this->tableName");
        
        // turn them into entities
        foreach ($entitiesAsArrays as $entity)
        {
            $entities[] = $this->loadEntityFromArray($entity);
        }
        
        return $entities;
    }
    
    /**
     * Get an Entity by its id
     *      
     * @param int $id
     * @return Entity
     */
    public function loadById($id) // returns an entity
    {
        $sqlQuery = "SELECT * FROM $this->tableName WHERE id = ?";
        $statement = $this->dbConnection->prepare($sqlQuery);
        $statement->bindValue(1, $id);
        
        if ($statement->execute() === true) {
            return $statement->fetch();
        } 
        return null;
    }
    
    public function loadPage($page, $perPage)
    {
        
    }
    
    public function getTableName()
    {
        return $this->tableName;
    }
    
    protected function loadArrayFromEntity(AbstractEntity $entity)
    {
        return $entity->toArray();
    }
    
    abstract protected function loadEntityFromArray(array $properties); // returns an entity
}
