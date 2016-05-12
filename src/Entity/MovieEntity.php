<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class MovieEntity extends AbstractEntity 
{
    
    /**
     *
     * @var string
     */
    protected $title;
    
    /**
     *
     * @var int
     */
    protected $genreId;
    
    /**
     *
     * @var int OR IS IT 
     */
    protected $year;
    
    /**
     *
     * @var string
     */
    protected $cast;
    
    /**
     *
     * @var int
     */
    protected $duration;
    
    /**
     *
     * @var string
     */
    protected $poster;
    
    /**
     *
     * @var string
     */
    protected $linkImdb;
    
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
        return $this->genreId;
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
     * @return string
     */
    public function getCast() {
        return $this->cast;
    }
    
    /**
     * 
     * @return int
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
        return $this->linkImdb;
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
     * @param int $genreId
     */
    public function setGenreID($genreId) {
        $this->genreId = $genreId;
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
     * @param array $cast
     */
    public function setCast($cast) {
        $this->cast = $cast;
    }
    
    /**
     * 
     * @param int $duration
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
        $this->linkImdb = $imdbLink;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata) {
        
        /* Constraints for the id attribute. */    
        $metadata->addPropertyConstraint('id', new NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Type(array(
            'type'    => 'integer',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        
        /* Constraints for the genreId attribute. */  
        $metadata->addPropertyConstraint('genreId', new NotBlank());
        $metadata->addPropertyConstraint('genreId', new Assert\Type(array(
            'type'    => 'integer',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        
        /* Constraints for the year attribute. */  
        $metadata->addPropertyConstraint('year', new NotBlank());
        $metadata->addPropertyConstraint('year', new Assert\Type(array(
            'type'    => 'integer',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('year', new Assert\Range(array(
            'min'        => 1950,
            'max'        => 2016,
            'minMessage' => 'It appears that your movie was made before the wheel was invented.',
            'maxMessage' => 'We do not accept movies from the future. Sorry for the inconvenience.',
        )));
        
        /* Constraints for the cast attribute. */  
        $metadata->addPropertyConstraint('cast', new NotBlank());
        $metadata->addPropertyConstraint('cast', new Assert\Type(array(
            'type'    => 'string',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('cast', new Assert\Regex(array(
            'pattern' => '/^[\\p{L} ,]+$/ui',
            'message' => 'Invalid cast list.'
        )));
        
        /* Constraints for the duration attribute. */  
        $metadata->addPropertyConstraint('duration', new NotBlank());
        $metadata->addPropertyConstraint('duration', new Assert\Type(array(
            'type'    => 'integer',
            'message' => 'Duration is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('duration', new Assert\GreaterThan(array(
            'value' => 0,
            'message' => 'Duration must be greater than 0.'
        )));
        
        /* Constraints for the poster attribute. */  
        $metadata->addPropertyConstraint('poster', new NotBlank());
        /* Kept this in case mime type checking gets freaky. */
//        $metadata->addPropertyConstraint('poster', new Assert\Regex(array(
//            'pattern' => '/.*\.(jpg|png|jpeg|gif|GIF|JPEG|PNG|JPG)/',
//            'message' => 'Poster file has invalid type.'
//        )));
        $metadata->addPropertyConstraint('poster', new Assert\File(array(
            /* Uncomment maxSize and set if necessary. */
            /*'maxSize' => '1024k',*/
            'mimeTypes' => array(
                'image/png',
                'image/jpeg',
                'image/gif'
            ),
            /*'maxSizeMessage' => 'nu uploada capela sixtina mancatzeash' */
            'mimeTypesMessage' => 'Poster file has invalid type.',
        )));
        
        /* Constraints for the linkImdb attribute. */  
        $metadata->addPropertyConstraint('linkImdb', new NotBlank());
        $metadata->addPropertyConstraint('linkImdb', new Assert\Url());
        $metadata->addPropertyConstraint('linkImdb', new Assert\Regex(array(
            'pattern' => '/http:\/\/imdb\.com.*/',
            'message' => 'Invalid Imdb link.'
        )));
        
    }
}

