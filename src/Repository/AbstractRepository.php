<?php

namespace Repository;

use Doctrine\DBAL\Connection;
use Entity\AbstractEntity;

/**
 * @property Connection $dbConnection Description
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
        $this->dbConnection->insert($this->tableName, $entityAsArray);
    }

    public function delete(AbstractEntity $entity)
    {
        $id = $entity->getId();
        $this->deleteById($id);
    }

    public function deleteById($id)
    {
        $this->dbConnection->delete($this->tableName, array('id' => $id));
    }

    public function loadAll()
    {
        
    }

    public function loadById($id) // returns an entity
    {
        
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

    protected function loadEntityFromArray(array $properties) // returns an entity
    {
        
    }
}
