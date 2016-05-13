<?php

namespace Controller;

class MainController extends AbstractController
{
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

    public function showMainPage()
    {
        // repository will fix it if null
        $page = $this->getQueryParam('page');
        
        // set a default value
        $per_page = 8;

        // get the conditions for the query, if any
        $conditions = $this->getFormFilterData();

        // prepare the query - default values if null, actual values otherwise
        $queryData = array();

        if (is_null($conditions)) {
            $queryData['filters'] = null;
            $queryData['sort'] = null;
            $queryData['pagination'] = array('page' => $page, 'per_page' => $per_page);      
        } else {
            $queryData['filters'] = $conditions['filters'];
            $queryData['sort'] = array($conditions['sort']['column'] => $conditions['sort']['flag']);
            $queryData['pagination'] = array('page' => $page, 'per_page' => $conditions['pagination']['per_page']);
        }

        // get current movies
        $repository = $this->getRepository('movie');
        $movies = $repository->loadCurrentMovies($queryData);
        var_dump($movies);
        
        return $this->render('index', array('current_movies' => $movies));
    }

    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
