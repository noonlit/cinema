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
     * @param string $movieTitle movie's title
     * @return float
     */
    public function getProjectedIncomeForMovieBetween(\DateTime $firstDate, \DateTime $secondDate, $movieTitle)
    {
        $firstDate = $firstDate->format('Y-m-d');
        $secondDate = $secondDate->format('Y-m-d');

        $query = "SELECT sum((capacity - remaining_seats) * ticket_price) AS income
                  FROM (SELECT * FROM (SELECT {$this->tableName}.remaining_seats, {$this->tableName}.ticket_price, 
                    {$this->tableName}.date, {$this->tableName}.movie_id, rooms.capacity
                  FROM {$this->tableName}
                  LEFT JOIN rooms ON {$this->tableName}.room_id = rooms.id 
                  HAVING {$this->tableName}.date >= '{$firstDate}' AND {$this->tableName}.date <= '{$secondDate}') AS result 
                  LEFT JOIN movies ON result.movie_id = movies.id WHERE movies.title = ?) AS final_result";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $movieTitle);
        $statement->execute();
        $projectedIncome = $statement->fetch();
        return $projectedIncome['income'];
    }

    /**
     * selects the schedules dates with the room id
     * @param int $roomId
     * @return array
     */
    public function getSchedulesDatesForRoom($roomId)
    {
        $query = "SELECT date,time FROM {$this->tableName} WHERE {$this->tableName}.room_id={$roomId} ;";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $roomId);
        $statement->execute();
        $dates = $statement->fetchAll();
        return $dates;
    }

    /**
     * selects the room.name,date,time,remaining_seats and occupancy level
     * @param \DateTime $date
     * @param \DateTime $time
     * @param type $roomId
     * @return array
     */
    public function getOccupancyForRoomOnDate(\DateTime $date, \DateTime $time, $roomId)
    {
        $date = $date->format('Y-m-d');
        $time = $time->format('H:i:s');
        $capacity = "(SELECT rooms.capacity FROM rooms WHERE rooms.id={$roomId})";
        
        $query = "SELECT rooms.name,date,time,remaining_seats,({$capacity} - remaining_seats)*100/{$capacity} AS percent FROM {$this->tableName}"
                . " LEFT JOIN rooms ON {$this->tableName}.room_id = rooms.id WHERE {$this->tableName}.room_id={$roomId} AND ({$this->tableName}.date = '{$date}' AND {$this->tableName}.time = '{$time}');";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $roomId);
        $statement->execute();
        $occupancyLevel = $statement->fetchAll(); //TODO MODIFY TO fetch()
        return $occupancyLevel;
    }

    /**
     * Converts properties array to \Entity\ScheduleEntity object.
     *
     * @param array $properties
     * @return ScheduleEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        return new ScheduleEntity($properties);
    }

}
