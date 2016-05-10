<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Repository\GenreRepository;


class GenreController extends AbstractController {

    /**
     * Shows the genre form.
     */
    public function showGenre() {
        return $this->render('genre');
    }

    public function ShowGenreList() {

          // build properties array
        $properties = [
            'name' => $genreName
        ];
          // get the repository
        $genreRepository = $this->getRepository('genre');

        // build an entity 
        $genre = new \Entity\GenreEntity($properties);
        
        return ($genre->getName());
        
        
//        foreach ($genres as $name => $genreName) {
//
//            return ($genreName->getName());
//            
//        }
        
    }

    public function getClassName() {
        return 'Controller\\AuthController';
    }

}
