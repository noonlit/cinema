<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\File\UploadedFile;
use Entity\MovieEntity;

class MovieController extends AbstractController
{
    private function tableObjectToArray($entries)
    {
        $array = [];
        foreach ($entries as $entry) {
            $array[] = $entry->toArray();
        }
        return $array;
    }

    public function showMoviesPaginated()
    {
        return $this->render('showpaginated');
    }

    /**
     * @return string
     */
    public function showMovie()
    {
//        $genreRepo = $this->getRepository('genre');
        $movieId = $this->getCustomParam('id');
        $movieRepo = $this->getRepository('movie');
        $movieById = $movieRepo->loadByProperties(['id' => $movieId]);
        if (empty($movieById)) {
            return $this->application->abort(404, 'Could not find the requested movie!');
        }
        $movie = reset($movieById);
        
        $scheduleRepository = $this->getRepository('schedule');
        $movieId = $this->getCustomParam('id');

        /// didn't we just create this movie 3 lines above?
        $movieRepo = $this->getRepository('movie');
        $moviesById = $movieRepo->loadByProperties(['id' => $movieId]);

        if (empty($moviesById)) {
            return $this->application->abort(404, 'Could not find the requested movie!');
        }

        $movie = reset($moviesById);
        $context = [
            'movie' => $movie,
            'genreList' => $movie->getGenres(),
            'schedules' => $scheduleRepository->getDatesForMovie($movie->getId()),
        ];
        return $this->render('showmovie', $context);
    }
    
    public function getAvailableHours() {
        $movieId = $this->getCustomParam('id');
        $movieDate= $this->getCustomParam('date');
        
        $scheduleRepository = $this->getRepository('schedule');
        $properties = ['movie_id' => $movieId, 'date' => $movieDate];
        $rightSchedule = $scheduleRepository->loadByProperties($properties);
        
        $results = array();
        foreach ($rightSchedule as $key => $schedule) {
            $results[$key]['time'] = $schedule->getTime();
        }

        return $this->application->json($results);
    }
    
    /**
     * @param int $movieId
     * @return null|\Entity\MovieEntity
     */
    private function getMovieById($movieId)
    {
        $movieRepo = $this->getRepository('movie');
        try {
            $moviesByTitle = $movieRepo->loadByProperties(['id' => $movieId]);

            if (empty($moviesByTitle)) {
                return null;
            }

            return reset($moviesByTitle);
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse|html
     */
    public function computeIncome()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        $movieId = $this->getCustomParam('id');
        $movie = $this->getMovieById($movieId);

        if ($movie == null) {
            $this->application->abort(404, 'Movie not found!');
        }

        $minDate = strval($movie->getYear()) . "-01" . "-01";
        if ($this->request->isMethod('POST')) {
            if ($movie == null) {
                $errorResponse['message'] = 'Could not find a match for this movie.';
                return $this->jsonResponse($errorResponse);
            }
            
            $start = $this->getPostParam('start_date');
            $end = $this->getPostParam('end_date');
            
            $startDate = \DateTime::createFromFormat('Y-m-d', $start);
            $endDate = \DateTime::createFromFormat('Y-m-d', $end);
            if ($startDate == false || $endDate == false) {
                $errorResponse['message'] = 'The dates you entered are invalid!';
                return $this->jsonResponse($errorResponse);
            }
            if ($startDate > $endDate) {
                $errorResponse['message'] = 'End date should be greather then start date!.';
                return $this->jsonResponse($errorResponse);
            }
            
            $scheduleRepo = $this->getRepository('schedule');
            try {
                $income = intval($scheduleRepo->getProjectedIncomeForMovieBetween($startDate, $endDate, $movieId));
            } catch (\Exception $ex) {
                $errorResponse['message'] = $ex->getMessage() . 'Could not load informations about this movie, please contact the administrator!';
                return $this->jsonResponse($errorResponse);
            }
            
            $successResponse = array(
                'type' => 'success',
                'title' => 'Success',
                'message' => "The projected income for movie {$movie->getTitle()} is {$income}.",
            );
            return $this->jsonResponse($successResponse);
        }
        $context = array(
            'movie' => $movie,
            'max_date' => date("Y-m-d"),
            'min_date' => $minDate
        );
        return $this->render('income', $context);
    }

    /**
     * Returns the last submitted data via post method
     * 
     * @return array
     */
    public function getLastMovieFormData()
    {
        $context = [
            'last_title' => $this->getPostParam('title'),
            'last_year' => $this->getPostParam('year'),
            'last_cast' => $this->getPostParam('cast'),
            'last_duration' => $this->getPostParam('duration'),
            'last_link_imdb' => $this->getPostParam('link_imdb'),
            'last_genres' => $this->getPostParam('genres'),
        ];
        
        if ($this->session->get('last_movie_form') === null) {
            $this->session->set('last_movie_form', $context);
        }
        
        if ($this->request->isMethod('POST')) {
            $this->session->set('last_movie_form', $context);
        }
        
        return $this->session->get('last_movie_form');
    }

    /**
     * @param string $title
     * @return \Entity\MovieEntity|null
     */
    private function getMovieByTitle($title)
    {
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(array(
            'title' => $title
        ));
        
        if (empty($moviesByTitle)) {
            return null;
        }
        return reset($moviesByTitle);
    }

    /**
     * returns the uploaded image
     * 
     * @return UploadedFile|null
     */
    private function getUploadedFile($name)
    {
        return $this->request->files->get($name);
    }

    /**
     * Returns an array containg all genres
     * 
     * @return \Entity\GenreEntity[]
     */
    private function getAllGenres()
    {
        $genreRepo = $this->getRepository('genre');
        return $genreRepo->loadAll();
    }

    /**
     * Handles the form for adding a new movie
     * 
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|html
     */
    public function addMovie()
    {
        $this->getUploadFileUrlDir();
        $lastData = $this->getLastMovieFormData();
        $data = $lastData + $currentContext = array(
            'genreList' => $this->getAllGenres(),
        );
        
        if ($this->request->isMethod('POST')) {
            if ($this->getMovieByTitle($this->getPostParam('title')) !== null) {
                $this->addErrorMessage('Already exists a movie with this title');
                return $this->render('addmovie', $data);
            }
            
            $genres = $this->getPostParam('genres');
            if (empty($genres)) {
                $this->addErrorMessage('You have not selected any genre!');
                return $this->render('addmovie', $data);
            }
            
            $movieRepository = $this->getRepository('movie');
            $movieInfo = [
                'title' => $this->getPostParam('title'),
                'year' => $this->getPostParam('year'),
                'cast' => $this->getPostParam('cast'),
                'duration' => $this->getPostParam('duration'),
                'linkImdb' => $this->getPostParam('link_imdb'),
            ];
            $uploaded = true;
            
            try {
                $movie = $this->getEntity('movie', $movieInfo);
            } catch (\Exception $ex) {
                $this->addErrorMessage($ex->getMessages());
                return $this->render('addmovie', $data);
            }
            
            $uploadedFile = $this->getUploadedFile('poster');
            if ($uploadedFile !== null) {
                $uploaded = $this->handleFileUpload($movie, $uploadedFile);
            } else {
                $movie->setPoster($this->getDefaultFile());
            }
            
            if ($uploaded == false) {
                $this->addErrorMessage('The image could not be uploaded!');
                return $this->render('addmovie', $data);
            }
            
            try {
                $movieRepository->save($movie);
                $this->setMovieGenres($movie, $genres);
                $this->addSuccessMessage('Movie succesfully added!');
                
                //if the operation succeded i don t need to memorize the form anymore
                $this->session->set('last_movie_form', null);
                $movie = $this->getMovieByTitle($movie->getTitle());
                return $this->redirectRoute('show_movie', ['id' => $movie->getId()]);
            } catch (\Exception $ex) {
                $this->addErrorMessage($ex->getMessage() . 'Something went wrong! Could not add the movie!');
            }
        }
        return $this->render('addmovie', $data);
    }

    /**
     * @param MovieEntity $movie
     * @param array $genresIds
     * @return null|void
     */
    private function setMovieGenres(\Entity\MovieEntity $movie, array $genresIds)
    {
        $movieRepository = $this->getRepository('movie');
        $moviesByTitle = $movieRepository->loadByProperties(['title' => $movie->getTitle()]);
        
        if (empty($moviesByTitle)) {
            return;
        }
        
        $movie = reset($moviesByTitle);
        $movieRepository->setMovieGenres($movie, $genresIds);
    }

    /**
     * @return string
     */
    private function getDefaultFile()
    {
        return '/img/movie/poster/default.jpg';
    }

    /**
     * Returns the url where all poster for the movies will be uploaded 
     * with a trailing /
     * 
     * @return string
     */
    private function getUploadFileUrlDir()
    {
        return '/img/movie/poster/';
    }

    /**
     * Returns the directory where all poster for the movies will be uploaded 
     * with a trailing /
     * 
     * @return string
     */
    private function getUploadFileFullPathDir()
    {
        $documentRoot = $this->getDocumentRoot();
        $fullPath = "";
        if (strpos($documentRoot, '/cinema/web') === FALSE) {
            $fullPath = rtrim($documentRoot, '/') . '/cinema/web/';
        } else {
            $fullPath = $documentRoot;
        }
        $fullPath = rtrim($fullPath, '/') . '/img/movie/poster';
        return $fullPath;
    }

    /**
     * Handles the upload of a user image.
     *
     * @param \Entity\MovieEntity $movie
     * @param UploadedFile $poster Description
     * @return boolean TRUE if a new user image was uploaded, FALSE otherwise.
     */
    protected function handleFileUpload(\Entity\MovieEntity $movie, UploadedFile $poster)
    {
        // If a temporary file is present, move it to the correct directory
        // and set the filename on the movie.
        $allowedExtensions = array(
            'jpeg', 'jpg', 'png', 'gif'
        );
        $ext = $poster->guessExtension();
        
        if (in_array(strtolower($ext), $allowedExtensions)) {
            try {
                $newFileName = $movie->getTitle() . '_poster.' . $poster->guessExtension();
                
                //remove anything that is not letter,space or number from title
                $title = $movie->getTitle();
                $cleanSearchTitle = preg_replace('/[^\pL\p{Nd}\p{Zs}]/u', "", $title);
                
                $newFileName = str_replace(" ", "_", $cleanSearchTitle) . '_poster.' . $poster->guessExtension();
                $realDir = $this->getUploadFileFullPathDir();
                
                $poster->move($realDir, $newFileName);
                $movie->setPoster($this->getUploadFileUrlDir() . $newFileName);
                return true;
            } catch (\Exception $ex) {
                $this->addErrorMessage($ex->getMessage());
                return false;
            }
        }
        return false;
    }

    /**
     * Renders the form for editing a movie.
     * 
     * @return string
     */
    public function showEditMovie()
    {
        $movieId = $this->getCustomParam('id');
        $movieRepository = $this->getRepository('movie');
        $genreRepository = $this->getRepository('genre');
        
        try {
            $movieArray = $movieRepository->loadByProperties(array('id' => $movieId));
            $genreArray = $genreRepository->loadAll();
        } catch (\Exception $ex) {
            return 0;
        }
        
        $movieObject = reset($movieArray);
        $context = [
            'movie' => $movieObject,
            'genreList' => $genreArray
        ];
        return $this->render('editmovie', $context);
    }

    /**
     * Edits a movie.
     * If the edit was successful, the user is redirected to the movie page.
     * If the edit was unsuccessful, the user is prompted to modify the invalid fields.
     * 
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editMovie()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        
        $movieInfo = [
            'title' => $this->getPostParam('title'),
            'genres' => $this->getPostParam('genres'),
            'year' => $this->getPostParam('year'),
            'cast' => $this->getPostParam('cast'),
            'duration' => $this->getPostParam('duration'),
            'poster' => $this->getUploadedFile('poster'),
            'linkImdb' => $this->getPostParam('link_imdb'),
        ];
        
        try {
            $editedMovie = $this->getEntity('movie', $movieInfo);
            $this->handleFileUpload($editedMovie, $movieInfo['poster']);
            
            $editedMovie->setId($this->getCustomParam('id'));
            $movieRepository = $this->getRepository('movie');

            $movieRepository->save($editedMovie);
            $this->addSuccessMessage('Movie successfully edited.');
            return $this->redirectRoute('show_movie', ['id' => $editedMovie->getId()]);
        } catch (\Framework\Exception\MovieValidatorException $ex) {
            $this->addErrorMessage($ex->getMessages());
            return $this->showEditMovie();
        }
    }

}
