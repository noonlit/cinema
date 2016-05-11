<?php

namespace Controller;

class GenreController extends AbstractController {

    
    /**
     * Shows genre list
     * @return array
     */
    public function ShowGenreList() {

        $genreRepository = $this->getRepository('genre');
        $genreList = $genreRepository->loadAll();
        $context = [
            'genreList' => $genreList,
        ];
        return $this->render('genre', $context);
    }
    
    /*
     * add  new genre name in genre list
     */
    public function addGenre() {
        return $this->redirectRoute('genre');
        $context = [
            'last_name' => $nav,
        ];

        return $this->render('genre');
    }
    /*
    * delete a genre name from genre list
    */
    public function deleteGenre() {
        
    }

    /*
     * edit a genre name from genr elist
     */
    public function editGenre() {
        
    }

    public function getClassName() {
        return 'Controller\\GenreController';
    }

}
