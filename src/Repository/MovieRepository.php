<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class MovieRepository extends AbstractRepository
{
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->db = $dbConnection;
    }
}