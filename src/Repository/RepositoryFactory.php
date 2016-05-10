<?php

namespace Repository;

use Doctrine\DBAL\Connection as Connection;

class RepositoryFactory
{

    /**
     * @var Connection $dbConnection
     */
    private $dbConnection;

    /**
     * @var array $repositoryMappings
     */
    private $repositoryMappings;

    /**
     * @param Connection $dbConnection
     * @param array $repositoryMappings
     */
    public function __construct(Connection $dbConnection, array $repositoryMappings)
    {
        $this->dbConnection = $dbConnection;
        $this->repositoryMappings = $repositoryMappings;
    }

    /**
     * Returns a repository.
     * 
     * @param string $repositoryName 
     * @return null|BookingRepository|GenreRepository|MovieRepository|RoomRepository|ScheduleRepository|UserRepository
     */
    public function create($repositoryName)
    {
        switch ($repositoryName) {
            case 'user':
                return new UserRepository($this->dbConnection, $this->repositoryMappings['users']['db_table']);
            case 'movie':
                return new MovieRepository($this->dbConnection, $this->repositoryMappings['movies']['db_table']);
            case 'genre':
                return new GenreRepository($this->dbConnection, $this->repositoryMappings['genres']['db_table']);
            case 'room':
                return new RoomRepository($this->dbConnection, $this->repositoryMappings['rooms']['db_table']);
            case 'booking':
                return new BookingRepository($this->dbConnection, $this->repositoryMappings['bookings']['db_table']);
            case 'schedule':
                return new ScheduleRepository($$this->dbConnection, $this->repositoryMappings['schedules']['db_table']);
            default:
                return null;
        }
    }

}
