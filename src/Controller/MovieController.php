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
//        $genreRepo = $this->getRepository('genre');
        $movieTitle = $this->getCustomParam('title');
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['title' => $movieTitle]);
        if (empty($moviesByTitle)) {
            return $this->application->abort(404, 'Could not find the requested movie!');
        }
        $movie = reset($moviesByTitle);
//        var_dump($movie->getGenres());die();
        $context = [
            'movie' => $movie,
            'genreList' => $movie->getGenres(),
        ];

        return $this->render('showmovie', $context);
    }

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
     * 
     * @return \Symfony\Component\HttpFoundation\JsonResponse|html
     */
    public function computeIncome()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $movieId = $this->getCustomParam('id');
        $movie = $this->getMovieById($movieId);
        $minDate = strval($movie->getYear()) . "-01" . "-01";
        if ($this->request->isMethod('POST')) {
            if ($movie == null) {
                $errorResponse['message'] = 'Could not find a match for this movie.';
                return $this->jsonResponse($errorResponse);
            }
            $start = $this->getPostParam('start_date');
            $end = $this->getPostParam('end_date');
            $startDate = new \DateTime($start);
            $endDate = new \DateTime($end);
            if ($startDate > $endDate) {
                $errorResponse['message'] = 'End date should be greather then start date!.';
                return $this->jsonResponse($errorResponse);
            }
            $scheduleRepo = $this->getRepository('schedule');
            try {
                $income = intval($scheduleRepo->getProjectedIncomeForMovieBetween($startDate, $endDate, $movieId));
            } catch (\Exception $ex) {
                $errorResponse['message'] = 'Could not load informations about this movie, please contact the administrator!';
                return $this->jsonResponse($errorResponse);
            }
            $successResponse = array(
                'type' => 'success',
                'title' => 'Success',
                'message' => "The projected income for movie {$movie->getTitle()} is {$income}.",
            );
            return $this->jsonResponse($successResponse);
        }
        if ($movie == null) {
            $this->application->abort(404, 'Movie not found!');
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
     * 
     * @param MovieEntity $movie
     * @return "" if the movie is valid or a string with containning error messages
     */
    private function validateMovie(\Entity\MovieEntity $movie)
    {
        //TODO when you make an entity, it auto validates
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
                'linkImdb' => $this->getPostParam('link_imdb'),
            ];
            $uploaded = true;
            $movie = $this->getEntity('movie', $movieInfo);
//            $errors = $this->validateMovie($movie);
//            if ($errors != "") {
//                $this->addErrorMessage($errors);
//                return $this->render('addmovie', $data);
//            }
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
        return '/img/movie/poster/default.jpg';
    }

    /**
     * Returns the url where all poster for the movies will be uploaded 
     * with a trailing /
     * @return string
     */
    private function getUploadFileUrlDir()
    {
        return  '/img/movie/poster/';
    }

    /**
     * Returns the directory where all poster for the movies will be uploaded 
     * with a trailing /
     * @return string
     */
    private function getUploadFileFullPathDir()
    {
        return $this->application['movie_poster_dir'];
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
        // and set the filename on the user.
        $allowedExtensions = array(
            'jpeg', 'jpg', 'png', 'gif'
        );
        $ext = $poster->guessExtension();
        if (in_array(strtolower($ext), $allowedExtensions)) {
            try {
                $newFileName = $movie->getTitle() . '_poster.' . $poster->guessExtension();
                $realDir = $this->getUploadFileFullPathDir();
                $poster->move($realDir, $newFileName);
                $movie->setPoster($this->getUploadFileUrlDir() . $newFileName);
                return TRUE;
            } catch (\Exception $ex) {
                return FALSE;
            }
        }
        return false;
    }

    public function editMovie()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Movie could not be edited.';
        $repository = $this->getRepository('movie');
        try {
            $movieEntities = $repository->loadByProperties(['id' => $this->getCustomParam('id')]);
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);
        }
        if (count($movieEntities) != 1) {
            return $this->application->json($errorResponse);
        }
        $entity = reset($movieEntities);
        $entity->setTitle($this->getPostParam('value'));

//        $errorResponse['message'] = $entity->getId() ;
//        return $this->application->json($errorResponse);

        try {
            $repository->save($entity);
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);
        }
        $successResponse = array();
        $successResponse['message'] = 'Updated!';
        $successResponse['title'] = 'Success!';
        $successResponse['type'] = 'success';
        return $this->application->json($successResponse);
    }

}
