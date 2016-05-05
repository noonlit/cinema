<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class RoomRepository extends AbstractRepository
{
	private $tableName = 'rooms';
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}