<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class UserRepository extends AbstractRepository
{
	public function insert() // this will take a parameter - $user - which will be an entity, and we'll get its properties and store them (?)
	{
		// $this->dbConnection->insert($this->tableName, array('name' => 'Miauuu'));
		// with the entity as parameter, this would look smth like $this->dbConnection->insert($this-tableName, array('name' => $user->getName()));
	}
}