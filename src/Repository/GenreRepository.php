<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class GenreRepository extends AbstractRepository
{
	private $tableName = 'genres';
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}