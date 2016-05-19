<?php

namespace Controller;

/**
 * Description of ApiController
 *
 * @author marius
 */
class ApiController extends AbstractController
{

    /**
     * Returns the url to public folder without trailing /
     * Example:
     *      -for http://cinema/index.php/api/movie/477 - returns http://cinema
     *      -for http://localhost/cinema/web/index.php/api/movie/477 returns http://localhost/cinema/web
     * @return string
     */
    private function getDomainName()
    {
        $serverName = $this->request->server->get('SERVER_NAME');
        $basePath = $this->request->getBasePath();
        $scheme = $this->request->server->get('REQUEST_SCHEME');
        $url = $scheme . '://' . $serverName . $basePath;
        $url = rtrim($url, '/');
        return $url;
    }

    /**
     * The form of the response is;
     * {
     *      "success"    : boolean
     *      "message"    : string
     *      "movie"      : array(),   //serialiez \Entity\MovieEntity object
     * }
     * for the route get /api/movie/{id} ,
     *      if id parameter is valid, returns the serialized object with id {id}
     *      if an object with id {id} is not found, then null will be returned, and success flag set to false 
     *      if id parameter is invalid, the success flag is set to false and an error 
     *          message is added
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function movieDetails()
    {
        $response = [
            'success' => false,
            'message' => "",
            "movie" => null,
        ];
        $movieId = $this->getCustomParam('id');
        if ($movieId === null) {
            $response['message'] = 'Missing required parameter movie id!';
            return $this->jsonResponse($response, 400);
        }
        $movieRepo = $this->getRepository('movie');
        $moviesById = $movieRepo->loadByProperties(['id' => $movieId]);
        if (empty($moviesById)) {
            $response['message'] = 'Movie not found';
            return $this->jsonResponse($response, 401);
        }
        $movie = reset($moviesById);
        $response['movie'] = $movie->toArray();
        $response['movie']['poster'] = $this->getDomainName() . '/' . ltrim($response['movie']['poster'], '/');
        return $this->jsonResponse($response, 200);
    }

    /**
     * The form of the response is;
     * {
     *      "success"    : boolean
     *      "message"    : string
     *      "nr_results" : integer,   //the number of the results
     *      "results"    : array()    //the list of results    
     * }
     * for the route get /api/schedule/future/{date} ,
     *      if date parameter is missing, returns a list with movies scheduled in the future
     *      else if date is provided and valid then the list will contain only movies
     *           scheduled  in the specified day
     *      else if the date is invalid the flag success is set to false, and an error message is added
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function futureSchedules()
    {
        $response = [
            'success' => false,
            'message' => "",
            'nr_results' => 0,
            'results' => []
        ];
        $dateParam = $this->getCustomParam('date');
        if ($dateParam !== null) {
            try {
                $searchDate = new \DateTime($dateParam);
            } catch (\Exception $ex) {
                $response['message'] = 'The entered date is invalid!';
                return $this->jsonResponse($response, 400);
            }
        } else {
            $searchDate = null;
        }
        $scheduleRepo = $this->getRepository('schedule');
        $schedules = $scheduleRepo->getFutureSchedules($searchDate);
        $matches = [];
        foreach ($schedules as $schedule) {
            $matches[] = array(
                'date' => $schedule->getDate()->format('Y-m-d'),
                'time' => $schedule->getTime(),
                'remaining_seats' => $schedule->getRemainingSeats(),
                'movie_id' => $schedule->getMovieId(),
            );
        }
        $response['success'] = true;
        $response['nr_results'] = count($matches);
        $response['results'] = $matches;
        return $this->jsonResponse($response, 200);
    }

}
