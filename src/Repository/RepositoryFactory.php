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
     * @var array $repositories
     */
    private $repositories;

    /**
     * @param Connection $dbConnection
     * @param array $repositoryMappings
     */
    public function __construct(Connection $dbConnection, array $repositoryMappings)
    {
        $this->dbConnection = $dbConnection;
        $this->repositoryMappings = $repositoryMappings;
        $this->repositories = [];
    }

    /**
     * Returns a repository.
     * 
     * @param string $identifier
     * @return null|BookingRepository|GenreRepository|MovieRepository|RoomRepository|ScheduleRepository|UserRepository
     */
    public function create($identifier)
    {
        if (!isset($this->repositories[$identifier])) {
            $className = '\\Repository\\' . ucfirst($identifier) . 'Repository';

            if (!class_exists($className)) {
                return null;
            }

            $repositoryReflection = new \ReflectionClass($className);
            $repository = $repositoryReflection->newInstance($this->dbConnection, $this->repositoryMappings[$identifier]['db_table']);
            return $repository;
        }

        return $this->repositories[$identifier];
    }

}
