<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class RepositoryFactory
{

    public static function getRepository($repositoryName, Connection $dbConnection, $tableName)
    {
        switch ($repositoryName) {
            case 'user':
                return new UserRepository($dbConnection, $tableName);
            case 'movie':
                return new MovieRepository($dbConnection, $tableName);
            case 'room':
                return new RoomRepository($dbConnection, $tableName);
            case 'booking':
                return new BookingRepository($dbConnection, $tableName);
            case 'schedule':
                return new ScheduleRepository($dbConnection, $tableName);
            default:
                return null;
        }
    }

}
