<?php

namespace Controller;

class GenreController extends AbstractController {

    /**
     * Shows the genre form.
     */
    public function showGenre() {
        return $this->render('genre');
    }

    public function ShowGenreList() {

        $properties = [
            'name' => $genreName
        ];
        $genreRepository = $this->getRepository('genre');
        $genreList = $genreRepository->loadAll();

        return ($this->render('genre', $genreList));
    }

    public function getClassName() {
        return 'Controller\\AuthController';
    }

}
