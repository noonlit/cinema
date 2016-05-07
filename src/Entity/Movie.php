<?php

namespace Entity;

class Movie extends \Entity\AbstractEntity {
    
    /**
     *
     * @var int 
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $title;
    
    /**
     *
     * @var int
     */
    private $genreID;
    
    /**
     *
     * @var int OR IS IT 
     */
    private $year;
    
    /**
     *
     * @var string OR IS IT
     */
    private $actors;
    
    /**
     *
     * @var DateTime OR IS IT
     */
    private $duration;
    
    /**
     *
     * @var string
     */
    private $poster;
    
    /**
     *
     * @var string
     */
    private $imdbLink;
    
    /**
     * 
     * @param array $movieInfo
     */
    public function __construct(array $movieInfo) {
        $this->id = $movieInfo['id'];
        $this->title = $movieInfo['title'];
        $this->genreID = $movieInfo['genreID'];
        $this->year = $movieInfo['year'];
        $this->actors = $movieInfo['actors'];
        $this->duration = $movieInfo['duration'];
        $this->poster = $movieInfo['poster'];
        $this->imdbLink = $movieInfo['link_imdb'];
    }
    
    /**
     * 
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * 
     * @return int
     */
    public function getGenreID() {
        return $this->genreID;
    }
    
    /**
     * 
     * @return int OR IS IT
     */
    public function getYear() {
        return $this->year;
    }
    
    /**
     * 
     * @return array OR IS IT
     */
    public function getActors() {
        return $this->actors;
    }
    
    /**
     * 
     * @return DateTime OR IS IT 
    */
    public function getDuration() {
        return $this->duration;
    }
    
    /**
     * 
     * @return string
     */
    public function getPoster() {
        return $this->poster;
    }
    
    /**
     * 
     * @return string
     */
    public function getImdbLink() {
        return $this->imdbLink;
    }
    
    /**
     * 
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    
    /**
     * 
     * @param int $genreID
     */
    public function setGenreID($genreID) {
        $this->genreID = $genreID;
    }
    
    /**
     * 
     * @param int $year
     */
    public function setYear($year) {
        $this->year = year;
    }
    
    /**
     * 
     * @param array $actors
     */
    public function setActors($actors) {
        $this->actors = $actors;
    }
    
    /**
     * 
     * @param DateTime $duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    
    /**
     * 
     * @param string $poster
     */
    public function setPoster($poster) {
        $this->poster = $poster;
    }
    
    /**
     * 
     * @param string $imdbLink
     */
    public function setImdbLink($imdbLink) {
        $this->imdbLink = $imdbLink;
    }
    
    
}
