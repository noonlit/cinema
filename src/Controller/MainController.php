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
        /*$lastForm = $this->session->get('filter_form_movie');
        if (!is_null($lastForm)) {
            return $lastForm;
        }*/

        // else, no data
        return null;
    }

    public function showMainPage()
    {
        // repository will fix it if null
        $page = $this->getQueryParam('page');
        
        // set a default value for pagination
        $per_page = 8;

        // get the conditions for the query, if any
        $conditions = $this->getFormFilterData();

        // prepare the query - default values if null, actual values otherwise
        $queryConditions = array();

        if (is_null($conditions)) {
            $queryData['filters'] = null;
            $queryData['sort'] = null;
            $queryData['between'] = null;
            $queryData['pagination'] = array('page' => $page, 'per_page' => $per_page);      
        } else {
            // extract the conditions
            $filters = $conditions['filters'];
            $sortColumn = $conditions['sort']['column'];
            $sortFlag = $conditions['sort']['flag'];
            $startDate = $conditions['between']['start_date'];
            $endDate = $conditions['between']['end_date'];
            $startTime = $conditions['between']['start_time'];
            $endTime = $conditions['between']['end_time'];
            $perPage = $conditions['pagination']['per_page'];

            // build the query conditions array
            $queryConditions['filters'] = $filters;
            $queryConditions['sort'] = array($sortColumn => $sortFlag);

            // make sure you have a date and time
            if (empty($startDate)) {
                $date = new \DateTime();
                $startDate = $date->format('Y-m-d');
            }

            if (empty($endDate)) {
                $date = new \DateTime('2150-12-31');
                $endDate = $date->format('Y-m-d');
            }

            if (empty($startTime)) {
                $startTime = '08:00:00';
            }

            if (empty($endTime)) {
                $endTime = '20:00:00';
            }

            $queryConditions['between'] = array('date' => array($startDate, $endDate), 'time' => array($startTime, $endTime));
            $queryConditions['pagination'] = array('page' => $page, 'per_page' => $perPage);
        }

        // get current movies
        $repository = $this->getRepository('movie');
        $movieData = $repository->loadCurrentMovieData($queryConditions);

        var_dump($movieData);
        
        return $this->render('index', array('current_movie_data' => $movieData));
    }

    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
