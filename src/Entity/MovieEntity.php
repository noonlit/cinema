<?php

namespace Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class MovieEntity extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title;
    
    /**
     * @var array
     */
    protected $genres;
    
    /**
     * @var int
     */
    protected $year;

    /**
     * @var string
     */
    protected $cast;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var string
     */
    protected $poster;

    /**
     * @var string
     */
    protected $linkImdb;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getGenres() {
        return $this->genres;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @return string
     */
    public function getLinkImdb()
    {
        return $this->linkImdb;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param array $genres
     */
    public function setGenres($genres) {
        $this->genres = $genres;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param array $cast
     */
    public function setCast($cast)
    {
        $this->cast = $cast;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @param string $poster
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
    }

    /**
     * @param string $imdbLink
     */
    public function setLinkImdb($imdbLink)
    {
        $this->linkImdb = $imdbLink;
    }

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        /* Constraints for the genres attribute. */  
        $metadata->addPropertyConstraint('title', new Assert\NotBlank(array(
            'message' => 'The title must not be blank.'
        )));
        $metadata->addPropertyConstraint('title', new Assert\Length(array(
            'min' => 1,
            'max' => 45,
        )));
        
        
        /* Constraints for the genres attribute. */  
        $metadata->addPropertyConstraint('genres', new NotBlank(array(
            'message' => 'You have not selected any genres.'
        )));
        $metadata->addPropertyConstraint('genres', new Assert\Type(array(
            'type'    => 'array',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        
        /* Constraints for the year attribute. */  
        $metadata->addPropertyConstraint('year', new NotBlank(array(
            'message' => 'The year field should not be blank'
        )));
        $metadata->addPropertyConstraint('year', new Assert\Type(array(
            'type' => 'integer',
            'message' => 'The year {{ value }} is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('year', new Assert\Range(array(
            'min' => 1950,
            'max' => 2016,
            'minMessage' => 'Invalid year.',
            'maxMessage' => 'Invalid year.',
        )));

        /* Constraints for the cast attribute. */
        $metadata->addPropertyConstraint('cast', new NotBlank(array(
            'message' => 'The cast field should not be empty.',
        )));
        $metadata->addPropertyConstraint('cast', new Assert\Type(array(
            'type' => 'string',
            'message' => 'The value {{ value }} is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('cast', new Assert\Regex(array(
            'pattern' => '/^[\\p{L} ,.]+$/ui',
            'message' => 'Invalid cast list.'
        )));

        /* Constraints for the duration attribute. */
        $metadata->addPropertyConstraint('duration', new NotBlank(array(
            'message' => 'The duration field should not be empty.',
        )));
        $metadata->addPropertyConstraint('duration', new Assert\Type(array(
            'type' => 'integer',
            'message' => 'Duration is not a valid {{ type }}.',
        )));
        $metadata->addPropertyConstraint('duration', new Assert\GreaterThan(array(
            'value' => 0,
            'message' => 'Duration must be greater than 0.'
        )));
        
        /* Constraints for the poster attribute. */
        $metadata->addPropertyConstraint('poster', new NotBlank(array(
            'message' => 'You have not uploaded any poster.',
        )));
        $metadata->addPropertyConstraint('poster', new Assert\File(array(
            'mimeTypes' => array(
                'image/png',
                'image/jpeg',
                'image/gif'
            ),
            'mimeTypesMessage' => 'Please upload a valid image.',
        )));

        /* Constraints for the linkImdb attribute. */
        $metadata->addPropertyConstraint('linkImdb', new NotBlank(array(
            'message' => 'The imdb link field should not be empty.',
        )));
        $metadata->addPropertyConstraint('linkImdb', new Assert\Url());
        $metadata->addPropertyConstraint('linkImdb', new Assert\Regex(array(
            'pattern' => '/http:\/\/(?:www\.)?imdb\.com\/title\/tt.*/',
            'message' => 'Invalid Imdb link.'
        )));
    }

}
