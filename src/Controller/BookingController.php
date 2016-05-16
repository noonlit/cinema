<?php

namespace Controller;

use Entity\BookingEntity;
use Entity\MovieEntity;
use Entity\RoomEntity;
use Repository\BookingRepository;
use Repository\MovieRepository;
use Repository\RoomRepository;
use Repository\ScheduleRepository;


/**
 * BookingController for adding booking         
 *
 * @author sergiu
 */
class BookingController extends AbstractController { 
    public function addBooking() {
        // taking care the possibiltiies if the user is not logged
        $user = $this->getLoggedUser();
        $movieTitle = $this->getCustomParam('title');
        // take from post after remake DATE and HOUR => scheduleId
        // make another input field in form with number of seats and take it
        // take userId
        $movieRepository = $this->getRepository('movie');
        try {
            $moviesByeTitle = $movieRepository->loadByProperties(['title' => $movieTitle]);
        } catch (\Exception $ex) {
            $this->addErrorMessage("Cannot find the movie!");
            return $this->redirectRoute('homepage');
        }
        if(empty($moviesByeTitle)) {
            $this->application->abort(404, "Movie not Found");
        }
        $movie = reset($moviesByeTitle);
        $scheduleRepository = $this->getRepository('schedule');
        $schedule = $scheduleRepository->loadByProperties(['movie_id' => $movie->getId()]);
        //take it from form
        $theNumberOfSeats = 3;
        // this will be taken from form based on Date and Hour
        $theScheduleId = $schedule[0]->getId();
        $booking = new BookingEntity([
             'seats'     => $theNumberOfSeats, 
            'userId'     => $user->getId(), 
            'scheduleId' => $schedule[0]->getId()]);
        
        $bookingRepository = $this->getRepository('booking');
        $bookingRepository->makeBooking($booking);

        // maybe another route or a pop-uppop app
        return $this->redirectRoute('homepage');
    }

    protected function getClassName() {
        return 'BookingController';         
    }

}
        