<?php

namespace Framework\Helper;

class MainControllerHelper
{

    public static function prepareQueryData($page, $perPage, $conditions = null)
    {
        // if we have no $_POST data and nothing was stored in $_SESSION, set default values
        if (is_null($conditions)) {
            $queryConditions['filters'] = null;
            $queryConditions['sort'] = null;
            $queryConditions['between'] = null;
            $queryConditions['pagination'] = array('page' => $page, 'per_page' => $perPage);
            return $queryConditions;
        }

        // get the conditions
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

        // make sure we have a date (start day is today, end date is arbitrary date in distant future)
        if (empty($startDate)) {
            $date = new \DateTime();
            $startDate = $date->format('Y-m-d');
        }

        if (empty($endDate)) {
            $date = new \DateTime('2150-12-31');
            $endDate = $date->format('Y-m-d');
        }

        // make sure we have a time (cinema is open 8:00-20:00)
        if (empty($startTime)) {
            $startTime = '08:00:00';
        }

        if (empty($endTime)) {
            $endTime = '20:00:00';
        }

        $queryConditions['between'] = array('date' => array($startDate, $endDate), 'time' => array($startTime, $endTime));
        $queryConditions['pagination'] = array('page' => $page, 'per_page' => $perPage);

        return $queryConditions;
    }

    public static function prepareViewData(array $queryResult)
    {     
        // to show a movie, we need all its data. to display options in the selects, we need unique data
        $viewData = array('movie_data' => array(), 'select_options' => array());

        $i = 0;
        foreach ($queryResult as $movieData) {
            foreach($movieData as $key => $value) {
                $data = null;

                // we need genres as an array - it is currently a string with genres separated by commas
                if ($key == 'genres') {
                    $data = explode(',', $value);

                    // add the genres to the movie array they belong to
                    $viewData['movie_data'][$i][$key] = $data;
                } else {
                    // add the value to the movie array it belongs to
                    $viewData['movie_data'][$i][$key] = $value;

                    // then do a thing to avoid writing the same code twice for adding the exploded bits to the filters array as opposed to a single value
                    $data = array($value);
                }

                foreach($data as $value) {
                    // if we don't have this value among the select options, add it
                    if(!isset($viewData['select_options'][$key]) || !in_array($value, $viewData['select_options'][$key]) ){
                        $viewData['select_options'][$key][] = $value;
                    }
                }
            }
            $i++;
        }

        return $viewData;
    }
}
