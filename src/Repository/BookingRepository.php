<?php

namespace Repository;

use Entity\BookingEntity;

class BookingRepository extends AbstractRepository
{
    /**
     * Makes a booking and updates the number of remaining seats in the schedule.
     *
     * @param BookingEntity $booking
     * @throws \Exception If someone is trying to book more seats than there are available
     */
    public function makeBooking(BookingEntity $booking)
    {
        $this->dbConnection->beginTransaction();

        try {
            // step 1: save booking
            $this->save($booking);

            // step 2: update remaining seats in the schedule
            $sqlQuery = $this->dbConnection->createQueryBuilder();
            $sqlQuery->update('schedules');
            $sqlQuery->set('remaining_seats', "remaining_seats - {$booking->getSeats()}");
            $sqlQuery->where("id = {$booking->getScheduleId()}");
            $sqlQuery->execute();
            $this->dbConnection->commit();
        } catch (\Exception $e) {
            $this->dbConnection->rollBack();
            throw $e;
        }
    }

    /**
     * Converts properties array to \Entity\BookingEntity object.
     *
     * @param array $properties
     * @return BookingEntity
     */
    public function loadEntityFromArray(array $properties)
    {
        $entity = new BookingEntity();
        $entity->setPropertiesFromArray($properties);
        return $entity;
    }

}
