<?php

namespace Controller;

use Framework\Helper\MainControllerHelper as Helper;

class MainController extends AbstractController
{

    public function showMovies() {
        // why do you loop back????
        $data = $this->session->get('movie_data');
        if (is_null($data)) {
            return $this->loadFilteredMovies();
        } else {
            $pageHtml = $this->render('index', array('data' => $data));
            $this->session->set('movie_data', null);
            return $pageHtml;
        }
    }

    private function getFormFilterData()
    {
        // if we have post data, return those
        if ($this->request->isMethod('POST')) {
            $conditions = $this->getPostParam('conditions');
            $this->session->set('filter_form_movie', $conditions);
            return $conditions;
        }

        // else try getting them from session
        $lastForm = $this->session->get('filter_form_movie');
        if (!is_null($lastForm)) {
            return $lastForm;
        }
        
        // else, no data
        return null;
    }

    public function loadFilteredMovies()
    {        
        // repository will fix it if null
        $page = $this->getQueryParam('page');
        
        // set a default value for pagination
        $perPage = 8;

        // get the conditions for the query, if any
        $conditions = $this->getFormFilterData();

        // prepare query data
        $queryConditions = Helper::prepareQueryData($page, $perPage, $conditions);

        // get current movies
        $repository = $this->getRepository('movie');
        $data = $repository->loadCurrentMovieData($queryConditions);

        // keep the results
        $this->session->set('movie_data', $data);

        // go home
        if ($this->request->isMethod('POST')) {
            return $this->redirectRoute('homepage', array('data' => $data));
        } else {
            return $this->render('index', array('data' => $data));
        }       
    }



    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
