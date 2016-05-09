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
                  LEFT JOIN rooms ON {$this->tableName}.rooms_id = rooms.id
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
                    {$this->tableName}.date, {$this->tableName}.movies_id, rooms.capacity
                  FROM {$this->tableName}
                  LEFT JOIN rooms ON {$this->tableName}.rooms_id = rooms.id 
                  HAVING {$this->tableName}.date >= '{$firstDate}' AND {$this->tableName}.date <= '{$secondDate}') AS result 
                  LEFT JOIN movies ON result.movies_id = movies.id WHERE movies.title = ?) AS final_result";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(1, $movieTitle);
        $statement->execute();
        $projectedIncome = $statement->fetch();
        return $projectedIncome['income'];
    }

    /**
     * Converts properties array to \Entity\ScheduleEntity object.
     *
     * @param array $properties
     * @return ScheduleEntity
     */
    protected function loadEntityFromArray(array $properties) 
    {
        return new ScheduleEntity($properties);
    }

}
