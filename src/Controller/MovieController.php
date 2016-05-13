<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\File\UploadedFile;
use Entity\MovieEntity;

class MovieController extends AbstractController
{

    public function showMoviesPaginated()
    {

        return $this->render('showpaginated');
    }

    public function showMovie()
    {
        $genreRepo = $this->getRepository('genre');
        $movieTitle = $this->getCustomParam('title');
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['title' => $movieTitle]);
        if (empty($moviesByTitle)) {
            return $this->application->abort(404, 'Could not find the requested movie!');
        }
        $movie = reset($moviesByTitle);
        $context = [
            'movie' => $movie,
            'genreList' => $genreRepo->loadByMovieId($movie->getId()),
        ];
        return $this->render('showmovie', $context);
    }

    protected function getClassName()
    {
        return 'Controller\\MovieController';
    }

    private function getMovieById($movieId)
    {
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['id' => $movieId]);
        if (empty($moviesByTitle)) {
            return null;
        }
        return reset($moviesByTitle);
    }

    /**
     * 
     * @return type
     */
    public function computeIncome()
    {
        $movieId = $this->getCustomParam('id');   
        $context = array(
            'movie' => $this->getMovieById($movieId),
        );
        if ($this->request->isMethod('POST')) {
            $start = $this->getPostParam('start_date');
            $startDate = new \DateTime($start);
            $end = $this->getPostParam('end_date');
            $endDate = new \DateTime($end);
            $scheduleRepo = $this->getRepository('schedule');
            $income = $scheduleRepo->getProjectedIncomeForMovieBetween($startDate, $endDate, $movieId);
            
            return $this->jsonResponse(array(
                'income' => intval($income),
            ));
        }
        return $this->render('income', $context);
    }

    /**
     * Returns the last submitted data via post method
     * @return array()
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
        if ($this->session->get('last_movie_form') == null) {
            $this->session->set('last_movie_form', $context);
        }
        if ($this->request->isMethod('POST')) {
            $this->session->set('last_movie_form', $context);
        }
        return $this->session->get('last_movie_form');
    }

    /**
     * 
     * @param MovieEntity $movie
     * @return "" if the movie is valid or a string with containning error messages
     */
    private function validateMovie(\Entity\MovieEntity $movie)
    {
        try {
            $validator = new \Framework\Validator\MovieValidator();
            $validator->validate($movie);
        } catch (\Framework\Exception\MovieValidatorException $ex) {
            return $ex->getMessages();
        }
    }

    /**
     * 
     * @param string $title
     * @return \Entity\MovieEntity | null
     */
    private function loadMovieByTitle($title)
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
     * @return UploadedFile | null
     */
    private function getUploadedFile($name)
    {
        return $this->request->files->get($name);
    }
    
    /**
     * Returns an array containg all genres
     * @return \Entity\GenreEntity[]
     */
    private function getAllGenres()
    {
        $genreRepo = $this->getRepository('genre');
        return $genreRepo->loadAll();
    }

    /**
     * Handles the form for adding a new movie
     * @return Response
     */
    public function addMovie()
    {
        $lastData = $this->getLastMovieFormData();
        $data = $lastData + $currentContext = array(
            'genreList' => $this->getAllGenres(),
        );
        if ($this->request->isMethod('POST')) {
            if ($this->loadMovieByTitle($this->getPostParam('title')) !== null) {
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
                'link_imdb' => $this->getPostParam('link_imdb'),
            ];
            $uploaded = true;
            $movie = new MovieEntity($movieInfo);
            $errors = $this->validateMovie($movie);
            if ($errors != "") {
                $this->addErrorMessage($errors);
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
                return $this->redirectRoute('show_movie', ['title' => $movie->getTitle()]);
            } catch (\Exception $ex) {
                $this->addErrorMessage($ex->getMessage() . 'Something went wrong!Could not add the movie!');
            }
        }
        return $this->render('addmovie', $data);
    }
    
    /**
     * 
     * @param MovieEntity $movie
     * @param array $genresIds
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

    private function getDefaultFile()
    {
        return '/img/movie/poster/default.png';
    }

    /**
     * Returns the url where all poster for the movies will be uploaded 
     * with a trailing /
     * @return string
     */
    private function getUploadFileUrl()
    {
        $httpOrigin = $this->getHttpOrigin();
        return $httpOrigin . '/img/movie/poster/';
    }

    /**
     * Returns the directory where all poster for the movies will be uploaded 
     * with a trailing /
     * @return string
     */
    private function getUploadFileDir()
    {
        return $this->getDocumentRoot() . "/img/movie/poster/";
    }

    /**
     * Handles the upload of a user image.
     *
     * @param \MusicBox\Entity\User $movie
     *
     * @param boolean TRUE if a new user image was uploaded, FALSE otherwise.
     */
    protected function handleFileUpload(\Entity\MovieEntity $movie, UploadedFile $file)
    {
        // If a temporary file is present, move it to the correct directory
        // and set the filename on the user.
        $allowedExtensions = array(
            'jpeg', 'jpg', 'png', 'gif'
        );
        $ext = $file->guessExtension();
        $poster = $file;
        if (in_array(strtolower($ext), $allowedExtensions)) {
            try {
                $newFileName = $movie->getTitle() . '_poster.' . $poster->guessExtension();
                $realDir = $this->getUploadFileDir();
                $poster->move($realDir, $newFileName);
                $movie->setPoster("/img/movie/poster/" . $newFileName);
                return TRUE;
            } catch (\Exception $ex) {
                return FALSE;
            }
        }
        return false;
    }

}
