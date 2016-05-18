<?php

namespace Repository;

use Entity\ScheduleEntity;

class ScheduleRepository extends AbstractRepository
{

    
    /**
     * Calculates the projected income for the cinema between two dates.
     *
     * @param \DateTime The first date
     * @param \DateTime The second date
     * @return float 
     */
    public function getProjectedIncomeBetween(\DateTime $firstDate, \DateTime $secondDate)
    {
        $firstDate = $firstDate->format('Y-m-d');
        $secondDate = $secondDate->format('Y-m-d');

        $query = "SELECT sum((capacity - remaining_seats) * ticket_price) AS income
                  FROM (SELECT {$this->tableName}.remaining_seats, {$this->tableName}.ticket_price, {$this->tableName}.date, rooms.capacity
                  FROM {$this->tableName}
                  LEFT JOIN rooms ON {$this->tableName}.room_id = rooms.id
                  HAVING {$this->tableName}.date >= '{$firstDate}' AND {$this->tableName}.date <= '{$secondDate}') AS result";
        $sqlQuery = $this->dbConnection->executeQuery($query);
        $projectedIncome = $sqlQuery->fetch();
        return $projectedIncome['income'];
    }

    /**
     * Calculates the projected income for a single movie between two dates.
     *
     * @param \DateTime The first date
     * @param \DateTime The second date
     * @param string $movieId The movie's id
     * @return float
     */
    public function getProjectedIncomeForMovieBetween(\DateTime $firstDate, \DateTime $secondDate, $movieId)
    {
        $firstDate = $firstDate->format('Y-m-d');
        $secondDate = $secondDate->format('Y-m-d');
        $query = "SELECT sum((capacity - remaining_seats) * ticket_price) AS income
                    FROM (SELECT {$this->tableName}.remaining_seats, {$this->tableName}.ticket_price, {$this->tableName}.date, {$this->tableName}.movie_id, rooms.capacity
                    FROM {$this->tableName} LEFT JOIN rooms ON {$this->tableName}.room_id = rooms.id
                    HAVING {$this->tableName}.date >= {$firstDate} AND {$this->tableName}.date <= {$secondDate}
                    AND {$this->tableName}.movie_id = ?) as result";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $movieId);
        $statement->execute();
        $projectedIncome = $statement->fetch();
        return $projectedIncome['income'];
    }

    /**
     * selects the schedules dates with the room id
     * 
     * @param int $roomId
     * @return array
     */
    public function getSchedulesDatesForRoom($roomId)
    {
        $sqlQuery = $this->dbConnection->createQueryBuilder()
                ->select(array('date', 'time'))
                ->from("{$this->tableName}")
                ->where("{$this->tableName}.room_id={$roomId}");
        $statement = $this->dbConnection->prepare($sqlQuery);
        $statement->bindValue(1, $roomId);
        $statement->execute();
        $dates = $statement->fetchAll();
        return $dates;
    }

    /**
     * @return array
     */
    public function getAllSchedulesDatesForRoom()
    {
        $sqlQuery = $this->dbConnection->createQueryBuilder()
                ->select(array('DISTINCT (date)'))
                ->from("{$this->tableName}");

        $statement = $this->dbConnection->prepare($sqlQuery);
        $statement->execute();
        $dates = $statement->fetchAll();
        return $dates;
    }

    /**
     * selects the room.name,date,time,remaining_seats and occupancy level
     * 
     * @param int $scheduleId
     * @param int $roomId
     * @param int $capacity
     * @return float
     */
    public function getOccupancyForScheduleById($scheduleId, $capacity)
    {
        if ($capacity > 0) {
            $sqlQuery = $this->dbConnection->createQueryBuilder();
            $sqlQuery->select("round(({$capacity}-remaining_seats)*100/{$capacity},2) as percent")
                    ->from("$this->tableName")
                    ->where("{$this->tableName}.id={$scheduleId}");
                    
            $this->dbConnection->prepare($sqlQuery)
                    ->bindValue(1, $scheduleId);
            
            $statement = $sqlQuery->execute();
            $occupancyLevel = $statement->fetch()['percent'];
            return $occupancyLevel;
        }
    }

    /**
     * Converts properties array to \Entity\ScheduleEntity object.
     *
     * @param array $properties
     * @return \Entity\ScheduleEntity
     */
    protected function loadEntityFromArray(array $properties)
    {
        if (isset($properties['date'])) {
            $format = 'Y-m-d';
            $properties['date'] = \DateTime::createFromFormat($format, $properties['date']);
        }

        $entity = new ScheduleEntity();
        $entity->setPropertiesFromArray($properties);
        return $entity;
    }

    /**
     * selects the scheduled hours and movies with the date and time
     * 
     * @param string $date 
     * @return array
     */
    public function getScheduledMoviesForDate($date)
    {
        $query = "SELECT time, movie_id FROM {$this->tableName} WHERE date='{$date}'";
        $sqlQuery = $this->dbConnection->executeQuery($query);
        
        $movie_schedules = $sqlQuery->fetchAll();
        return $movie_schedules;
    }

    /**
     * @param Datetime $date
     * @param Time $time
     * @return \Entity\RoomEntity
     */
    public function groupByProperty($property) // TODO: bind. should be in abstract?
    {
        $query = "SELECT * FROM {$this->tableName} GROUP BY {$property}";
        $sqlQuery = $this->dbConnection->executeQuery($query);
        $grouped_entries = $sqlQuery->fetchAll();
        $grouped_entities = [];
        foreach ($grouped_entries as $entry) {
            $grouped_entities [] = $this->loadEntityFromArray($entry);
        }
        return $grouped_entities;
    }
    
    public function getAvailableRooms($date, $time)
    {
        $date = new \DateTime($date);
        $date = $date->format('Y-m-d');
        
        $time = new \DateTime($time);
        $time = $time->format('H:i:s');
        
        $query = "SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM {$this->tableName} WHERE date='{$date}' AND time='{$time}')";
        $sqlQuery = $this->dbConnection->executeQuery($query);
        
        $available_rooms = $sqlQuery->fetchAll();
        $tmp = array();
        
        foreach ($available_rooms as $key => $properties) {
            $tmp[$key] = new \Entity\RoomEntity();
            $tmp[$key]->setPropertiesFromArray($properties);
            $available_rooms[$key] = $tmp[$key];
        }
        return $available_rooms;
    }

    /**
     * @param string $query
     * @param array $conditions
     * @return array
     */
    public function loadSchedulesGrouped($query, $conditions)
    {
        return $this->runQueryWithConditions($query, $conditions);
    }
    
    public function getDatesForMovie($movieId) {    
        $querry = "SELECT * FROM {$this->tableName} WHERE movie_id = {$movieId} GROUP BY date";
        $sqlQuerry = $this->dbConnection->executeQuery($querry);
        $schedules = $sqlQuerry->fetchAll();
        foreach ($schedules as $schedule) {
            $objectSchedule[] = $this->loadEntityFromArray($schedule);
        }
        return $objectSchedule;
    }
    
}


