<?php

namespace Controller;

class MovieController extends AbstractController {
    
    public function showMoviesPaginated() {
        
    }
    
    public function showMovie()
    {
        echo "pac pac";
        $title = $this->getCustomParam('title');
        var_dump($title);
//        $movieRepo = $this->getRepository('movie');
//        $movieByTitle = $movieRepo->loadByProperties(['title' => $title]);
        return $this->render('showmovie');
    }
    
    protected function getClassName()
    {
        return 'Controller\\MovieController';
    }
    
}
