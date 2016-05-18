<?php

namespace Framework\Helper;

class Paginator
{

    private $totalPages;
    private $currentPage;
    private $resultsPerPage;

    public function __construct($currentPage, $totalResults, $resultsPerPage)
    {
        $this->currentPage = $currentPage === '' ? 1 : $currentPage;
        $this->resultsPerPage = $this->setResultsPerPage($totalResults, $resultsPerPage);
        $this->totalPages = $this->setTotalPages($totalResults, $resultsPerPage);
    }

    /**
     * resultsPerPage setter
     * @param int $totalResults
     * @param int $resultsPerPage
     * @return int
     */
    private function setResultsPerPage($totalResults, $resultsPerPage)
    {
        if ($resultsPerPage === '' || $resultsPerPage === null) {
            // In case we did not provide a number for $resultsPerPage
            $resultsPerPage = 8;
        } elseif ($resultsPerPage === 'all') {
            // In case we want all results on one page
            $resultsPerPage = $totalResults;
        }
        return $resultsPerPage;
    }

    /**
     * totalPages setter
     * @param int $totalResults
     * @param int $resultsPerPage
     * @return int
     */
    private function setTotalPages($totalResults)
    {
        $this->totalPages = ceil($totalResults / $this->resultsPerPage);
        return $this->totalPages;
    }

    public function getTotalPages()
    {
        return $this->totalPages;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

}
