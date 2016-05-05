<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class UserRepository extends AbstractRepository
{
	private $tableName = 'users';
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->db = $dbConnection;
    }

	public function insert() // this will take a parameter - $user - which will be an entity, and we'll get its properties and store them (?)
	{
		// $this->dbConnection->insert($this-tableName, array('name' => 'Miau'));
		// with the entity as parameter, this would look smth like $this->dbConnection->insert($this-tableName, array('name' => $user->getName()));
	}
}