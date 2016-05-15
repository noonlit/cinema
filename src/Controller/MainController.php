<?php

namespace Controller;

use Framework\Helper\MainControllerHelper as Helper;

class MainController extends AbstractController
{

    public function showMovies() {
        // why do you loop back????
        
        $context = $this->session->get('movie_data');
        if (is_null($context)) {
            return $this->loadFilteredMovies();
        } else {
            $pageHtml = $this->render('index', array('context' => $context));
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

    public function loadFilteredMovies($page = 1, $moviesPerPage = 8)
    {
        $context = [
            'movieList' => '',
            'maxPage' => '',
            'moviesPerPage' => '',
            'currentPage' => ''
        ];

        $movieRepository = $this->getRepository('movie');

        try {
            $maxMovieNumber = $movieRepository->getRowsCount();
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('index', $context);
        }

        $page = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $moviesPerPage = $moviesPerPage > $maxMovieNumber ? $maxMovieNumber : $moviesPerPage;

        // get the conditions for the query, if any
        $conditions = $this->getFormFilterData();

        // prepare query data
        $queryConditions = Helper::prepareQueryData($page, $moviesPerPage, $conditions);

        // get current movies
        try {
            $data = $movieRepository->loadCurrentMovieData($queryConditions);
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('index', $context);
        }

        $context = [
            'movieList' => $data,
            'maxPage' => $maxMovieNumber / $moviesPerPage,
            'moviesPerPage' => $moviesPerPage,
            'currentPage' => $page
        ];

        // keep the results
        $this->session->set('movie_data', $context);

        // go home
        if ($this->request->isMethod('POST')) {
            return $this->redirectRoute('homepage', array('context' => $context));
        } else {
            return $this->render('index', array('context' => $context));
        }
    }

    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
