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
        $movieTitle = $this->getCustomParam('title');
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['title' => $movieTitle]);
        if (empty($moviesByTitle)) {
            return $this->application->abort(404);
        }
        $movie = reset($moviesByTitle);
        $context = [
            'movie' => $movie,
            'movieGenre' => 'Comedie'
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
            var_dump($scheduleRepo->getProjectedIncomeForMovieBetween($startDate, $endDate, $movieId));
            return $this->redirectRoute('admin_movie_income', ['id' => $movieId]);
        }
        return $this->render('income', $context);
    }

    public function showAddMovie()
    {
        $context = [
            'last_title' => $this->getPostParam('title'),
            'last_year' => $this->getPostParam('year'),
            'last_cast' => $this->getPostParam('cast'),
            'last_duration' => $this->getPostParam('duration'),
            'last_poster' => $this->getPostParam('poster'),
            'last_link_imdb' => $this->getPostParam('link_imdb'),
        ];

        $genreRepo = $this->getRepository('genre');
        $context = array(
            'genreList' => $genreRepo->loadAll()
        );
        return $this->render('addmovie');
    }

    public function addMovie()
    {
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
        if (empty($_FILES['poster']['name']) == false) {
            $path = $_FILES['poster']['tmp_name'];
            $originalName = $_FILES['poster']['name'];
            $mimeType = $_FILES['poster']['type'];
            $size = $_FILES['poster']['size'];
            $file = new UploadedFile($path, $originalName, $mimeType, $size);
            $uploaded = $this->handleFileUpload($movie, $file);
        } else {
            $movie->setPoster('default.jpg');
        }
        if ($uploaded == false) {
            $this->addErrorMessage('The uploaded image is invalid!');
            return $this->redirectRoute('admin_show_add_movie');
        }
//            try {
//                $validator = new \Framework\Validator\MovieValidator();
//                $validator->validate($movie);
//            } catch (\Entity\MovieValidatorException $ex) {
//                $this->addErrorMessage($ex->getMessages());
//                return $this->redirectRoute('addmovie');
//            }
        try {
            $movieRepository->save($movie);
        } catch (\Exception $ex) {
            $this->addErrorMessage($ex->getMessage());
            return $this->redirectRoute('admin_show_add_movie');
        }
        $this->addSuccessMessage('Movie succesfully added!');
        return $thsis->redirectRoute('admin_show_add_movie');
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
        var_dump($file);
        $ext = $file->guessExtension();
        $poster = $file;
        if (in_array($ext, $allowedExtensions)) {
            $newFilename = $movie->getTitle() . '.' . $poster->guessExtension();
            $poster->move('/var/www/html/cinema/web/img/movie/poster/', $newFilename);
            $movie->setPoster($newFilename);
            return TRUE;
        }
        return TRUE;
    }

}
