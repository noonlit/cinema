<?php

namespace Controller;

/**
 * BookingController for adding booking
 *
 * @author sergiu
 */
class BookingController extends AbstractController
{
    public function addBooking()
    {
        // taking care the possibiltiies if the user is not logged
        $user = $this->getLoggedUser(
        ); /// be v careful, i can click the button while not logged in and get a popup full of undefined stuff

        // take from post after remake DATE and HOUR => scheduleId
        // make another input field in form with number of seats and take it
        // take userId
        try {
            $movieTitle = $this->getCustomParam('title');
            $movieRepository = $this->getRepository('movie');
            $moviesByTitle = $movieRepository->loadByProperties(['title' => $movieTitle]);

            if (empty($moviesByTitle)) {
                $this->application->abort(404, "Movie not Found");
            }

            $movie = reset($moviesByTitle);
            $scheduleRepository = $this->getRepository('schedule');
            $cookies = $this->request->cookies;
            $date = $cookies->get('dateSelect');
            $time = $cookies->get('hourSelect');
            $seats = $cookies->get('numberSeats');
            $schedulesForMovie = $scheduleRepository->loadByProperties(
                ['movie_id' => $movie->getId(), 'date' => $date, 'time' => $time]
            ); // can't there be more schedules with this movie id? maybe add date and time to query params?

            $schedule = reset($schedulesForMovie);
            $properties = [
                'seats'      => $seats,
                'userId'     => $user->getId(),
                'scheduleId' => $schedule->getId(),
            ];

            $booking = $this->getEntity('booking', $properties);
            $bookingRepository = $this->getRepository('booking');
            $bookingRepository->makeBooking($booking);
            $total = $schedule->getTicketPrice() * $booking->getSeats();
            $body = "Welcome ".$user->getEmail()."\nYou have a booking for ".$movie->getTitle()
                ." for ".$properties['seats']." person(s) \n You have to pay ".$schedule->getTicketPrice()
                ." for one ticket!\nTotal=".$total;

            $this->sendMail('swiftmailer', $user->getEmail(), '[Booking] Welcome to Cinema Village!', $body);
            $this->addSuccessMessage("Check your booking detail in your inbox!");

            return $this->redirectRoute('homepage');
        } catch (\Exception $ex) {
            $this->addErrorMessage("Something went wrong while trying to talk to the database.");

            return $this->redirectRoute('homepage');
        }

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
