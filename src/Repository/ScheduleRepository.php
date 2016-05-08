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
                  FROM (SELECT schedules.remaining_seats, schedules.ticket_price, schedules.date, rooms.capacity 
                  FROM schedules 
                  LEFT JOIN rooms ON schedules.rooms_id = rooms.id 
                  HAVING schedules.date >= '{$firstDate}' AND schedules.date <= '{$secondDate}') as result";
        $sqlQuery = $this->dbConnection->executeQuery($query);
        $projectedIncome = $sqlQuery->fetch();
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
