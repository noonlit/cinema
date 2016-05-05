<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class BookingRepository extends AbstractRepository
{
	private $tableName = 'bookings';
	private $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}