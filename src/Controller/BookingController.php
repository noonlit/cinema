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
        // USELESS =>  $theNumberOfSeats = $this->getPostParam('numberSeats');
        $theNumberOfSeats = $_COOKIE['numberSeats'];
        // this will be taken from form based on Date and Hour
        $theScheduleId = $schedule[0]->getId();
        $properties = [
            'seats' => $theNumberOfSeats,
            'userId' => $user->getId(),
            'scheduleId' => $schedule[0]->getId()
        ];
        // REFAAAAACTOR ^^^^^^ qeury pe schedule
        $booking = $this->getEntity('booking', $properties);
        $bookingRepository = $this->getRepository('booking');
        $bookingRepository->makeBooking($booking);
        $body = "Welcome ". $user->getEmail(). "\nYou have a book at ". $movie->getTitle().
                " for ". $properties['seats'];
        if($properties['seats'] === 1) {
            $body .= " person!";
        } else {
            $body .= " persons!";
        }
        //TODO: $body = pop-up content
        //input hidden
        //i don't know a thing
        $this->sendMail('swiftmailer', $user->getEmail(), '[Booking] Welcome to Cinema Village!', $body);
        // maybe another route or a pop-up app
        return $this->redirectRoute('homepage');
    }
    
        public function listDates()
    {               
        $data = ['schedules' => []];
        $schedules = $this->getRepository('schedule');
        $dates = $schedules->groupByProperty('date');
        foreach ($dates as $key => $date) {
            $data['schedules'][] = $date;
        } 
       
        return $this->render('showmovie', $data);
    } 
    
    protected function getClassName() {
        return 'BookingController';         
    }

}
        