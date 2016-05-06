<?php

namespace Entity;

class Movie extends \Entity\AbstractEntity {
    
    private $id;
    private $title;
    private $genreID;
    private $year;
    private $actors;
    private $duration;
    private $poster;
    private $imdbLink;
    
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
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getGenreID() {
        return $this->genreID;
    }
    
    public function getYear() {
        return $this->year;
    }
    
    public function getActors() {
        return $this->actors;
    }
    
    public function getDuration() {
        return $this->duration;
    }
    
    public function getPoster() {
        return $this->poster;
    }
    
    public function getImdbLink() {
        return $this->imdbLink;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function setGenreID($genreID) {
        $this->genreID = $genreID;
    }
    
    public function setYear($year) {
        $this->year = year;
    }
    
    public function setActors($actors) {
        $this->actors = $actors;
    }
    
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    
    public function setPoster($poster) {
        $this->poster = $poster;
    }
    
    public function setImdbLink($imdbLink) {
        $this->imdbLink = $imdbLink;
    }
    
    
}
