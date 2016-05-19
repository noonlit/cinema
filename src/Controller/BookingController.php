<?php

namespace Controller;

/**
 * BookingController for adding booking
 *
 * @author sergiu
 */
class BookingController extends AbstractController {
    public function addBooking() {
        // taking care the possibiltiies if the user is not logged
        $user = $this->getLoggedUser(); /// be v careful, i can click the button while not logged in and get a popup full of undefined stuff

            // take from post after remake DATE and HOUR => scheduleId
            // make another input field in form with number of seats and take it
            // take userId
            $movieTitle = $this->getCustomParam('title');
            $movieRepository = $this->getRepository('movie');
            $moviesByTitle = $movieRepository->loadByProperties(['title' => $movieTitle]);

            if(empty($moviesByTitle)) {
                $this->application->abort(404, "Movie not Found");
            }

            $movie = reset($moviesByTitle);
            $scheduleRepository = $this->getRepository('schedule');
            $cookies = $this->request->cookies;
            $date = $cookies->get('dateSelect');
            $time = $cookies->get('hourSelect');
            $schedulesForMovie = $scheduleRepository->loadByProperties(['movie_id' => $movie->getId(), 'date' => $date, 'time' => $time]); // can't there be more schedules with this movie id? maybe add date and time to query params?
            $seats = $cookies->get('numberSeats');

            
            $schedule = reset($schedulesForMovie);
            $properties = [
                'seats' => $seats,
                'userId' => $user->getId(),
                'scheduleId' => $schedule->getId()
            ];

            $booking = $this->getEntity('booking', $properties);
            $bookingRepository = $this->getRepository('booking');
            $bookingRepository->makeBooking($booking);
            $total = $schedule->getTicketPrice() * $booking->getSeats();
            $body = "Welcome ". $user->getEmail(). "\nYou have a booking at ". $movie->getTitle()
                    ." for ". $properties['seats']. " person(s)\nYou have to pay " . $schedule->getTicketPrice()
                    ." for one ticket!\nTotal=". $total;

            $this->sendMail('swiftmailer', $user->getEmail(), '[Booking] Welcome to Cinema Village!', $body);
            return $this->redirectRoute('homepage');

        /*$movieRepository = $this->getRepository('movie');
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
        return $this->redirectRoute('homepage'); */
    }

    public function listDates()
    {
        $data = ['schedules' => []];
        $schedules = $this->getRepository('schedule');
        $dates = $schedules->groupByProperty('date');
        foreach ($dates as $date) {
            $data['schedules'][] = $date;
        }

        return $this->render('showmovie', $data);
    }

}
