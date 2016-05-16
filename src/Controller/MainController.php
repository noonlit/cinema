<?php

namespace Controller;

use Framework\Helper\MainControllerHelper as Helper;

class MainController extends AbstractController
{
    /**
     * Renders previously retrieved movie data or gets new data.
     *
     * @return html
     */
    public function showMovies()
    {
        // why do you loop back????
        $context = $this->session->get('movie_data');
        $page = $this->getQueryParam('page');

        // if there is no session data or nobody tried to go to a different page, show existing data
        if (is_null($context) || !is_null($page) || !empty($page)) {
            return $this->loadFilteredMovies();
        } else {
            $html = $this->render('index', array('context' => $context));
            $this->session->set('movie_data', null);
            return $html;
        }
    }

    /**
     * Returns conditions for the repository query.
     *
     * @return array|null
     */
    private function getConditions()
    {
        // if we have post data, return those
        if ($this->request->isMethod('POST')) {
            $conditions = $this->getPostParam('conditions');
            $this->session->set('movie_query_conditions', $conditions);
            return $conditions;
        }

        // else try getting them from session
        $lastForm = $this->session->get('movie_query_conditions');
        if (!is_null($lastForm)) {
            return $lastForm;
        }

        // else, no data
        return null;
    }

    /**
     * Retrieves movies for displaying the main page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|html
     */
    public function loadFilteredMovies($page = 1, $moviesPerPage = 8)
    {
        $context = [
            'movieList' => '',
            'maxPage' => '',
            'moviesPerPage' => '',
            'currentPage' => '',
            'conditions' => ''
        ];

        // get the repository
        $movieRepository = $this->getRepository('movie');
        // get movies count (for pagination)
        try {
            $maxMovieNumber = $movieRepository->getRowsCount();
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong while trying to talk to the database.');
            return $this->render('index', $context);
        }

        // set values for page and movies per page
        $page = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $moviesPerPage = $moviesPerPage > $maxMovieNumber ? $maxMovieNumber : $moviesPerPage;

        // get the conditions for the query, if any
        $conditions = $this->getConditions();

        // structure existing data for running the query
        $queryConditions = Helper::prepareQueryData($page, $moviesPerPage, $conditions);

        // get current movies
        try {
            $data = $movieRepository->loadCurrentMovieData($queryConditions);
            var_dump($data);
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong while trying to talk to the database.');
            return $this->render('index', array('context' => $context));
        }

        // amend value for maximum movie number

        $maxPage = ceil($maxMovieNumber / $moviesPerPage);

        $context = [
            'movieList' => $data,
            'maxPage' => $maxPage,
            'moviesPerPage' => $moviesPerPage,
            'currentPage' => $page, 
            'conditions' => $conditions
        ];
   
        // store the results for later use
        $this->session->set('movie_data', $context);

        // go to/show homepage
        if ($this->request->isMethod('POST')) {
            return $this->redirectRoute('homepage', array('context' => $context));
        } else {
            return $this->render('index', array('context' => $context));
        }
    }
}
