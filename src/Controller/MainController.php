<?php

namespace Controller;

use Framework\Helper\MainControllerHelper as Helper;

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
        
        // set a default value for pagination
        $perPage = 8;

        // get the conditions for the query, if any
        $conditions = $this->getFormFilterData();

        // prepare query data
        $queryConditions = Helper::prepareQueryData($page, $perPage, $conditions);

        // get current movies
        $repository = $this->getRepository('movie');
        $result = $repository->loadCurrentMovieData($queryConditions);
        
        // configure the data for the view
        $data = Helper::prepareViewData($result);  
        return $this->render('index', array('data' => $data));
    }

    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
