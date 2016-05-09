<?php

namespace Entity;

class MovieEntity extends AbstractEntity 
{
    
    /**
     * @var string
     */
    protected $title;
    
    /**
     * @var int
     */
    protected $genreID;
    
    /**
     * @var int OR IS IT 
     */
    protected $year;
    
    /**
     * @var string 
     */
    protected $cast;
    
    /**
     * @var \DateTime OR IS IT
     */
    protected $duration;
    
    /**
     * @var string
     */
    protected $poster;
    
    /**
     * @var string
     */
    protected $imdbLink;
    
    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * @return int
     */
    public function getGenreID() {
        return $this->genreID;
    }
    
    /**
     * @return int OR IS IT
     */
    public function getYear() {
        return $this->year;
    }
    
    /**
     * @return string
     */
    public function getCast() {
        return $this->cast;
    }
    
    /**
     * @return \DateTime OR IS IT 
    */
    public function getDuration() {
        return $this->duration;
    }
    
    /**
     * @return string
     */
    public function getPoster() {
        return $this->poster;
    }
    
    /**
     * @return string
     */
    public function getImdbLink() {
        return $this->imdbLink;
    }
    
    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    
    /**
     * @param int $genreID
     */
    public function setGenreID($genreID) {
        $this->genreID = $genreID;
    }
    
    /**
     * @param int $year
     */
    public function setYear($year) {
        $this->year = year;
    }
    
    /**
     * @param string $cast
     */
    public function setCast($cast) {
        $this->cast = $cast;
    }
    
    /**
     * @param \DateTime $duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    
    /**
     * @param string $poster
     */
    public function setPoster($poster) {
        $this->poster = $poster;
    }
    
    /**
     * @param string $imdbLink
     */
    public function setImdbLink($imdbLink) {
        $this->imdbLink = $imdbLink;
    }
    
}
