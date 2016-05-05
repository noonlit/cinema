<?php

namespace Repository;

use Doctrine\DBAL\Connection;

class RepositoryFactory
{
	public static function getRepository(Connection $dbConnection, $repositoryName)
	{
		switch ($repositoryName) {
			case 'user':
				return new UserRepository($dbConnection);
			case 'movie':
				return new MovieRepository($dbConnection);
			case 'room':
				return new RoomRepository($dbConnection);
			case 'booking':
				return new BookingRepository($dbConnection);
			case 'schedule':
				return new ScheduleRepository($dbConnection);
			default:
				return null;
		}
	}
}