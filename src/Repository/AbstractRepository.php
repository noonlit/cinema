<?php

namespace Repository;

use Doctrine\DBAL\Connection;

abstract class AbstractRepository // not sure it will turn out to be v abstract
{
	protected $dbConnection;
	protected $tableName;
	
	public function __construct(Connection $dbConnection, $tableName)
    {
        $this->dbConnection = $dbConnection;
		$this->tableName = $tableName;
    }
}