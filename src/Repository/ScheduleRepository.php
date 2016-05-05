<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class ScheduleRepository extends AbstractRepository
{
	private $tableName = 'schedules';
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}