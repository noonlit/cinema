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
        $filters = array_filter($conditions['filters'], function($value) {
                return $value != 'all' && !empty($value);
            });
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

        $queryConditions['between'] = array('date' => array('start_date' => $startDate, 'end_date' => $endDate), 'time' => array('start_time' => $startTime, 'end_time' => $endTime));
        $queryConditions['pagination'] = array('page' => $page, 'per_page' => $perPage);

        return $queryConditions;
    }
}