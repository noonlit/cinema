<?php

namespace Framework\Validator;

use Symfony\Component\Validator\Validation;
use Framework\Exception\MovieValidatorException;

class MovieValidator
{

    /**
     * Checks if MovieEntity object is valid.
     * 
     * @param \Entity\MovieEntity $movie
     * @throws MovieValidatorException if MovieEntity object is invalid.
     */
    public function validate(\Entity\MovieEntity $movie)
    {
        /* Cast numeric attributes to int. */
        $movie->setYear((int) ($movie->getYear()));
        $movie->setDuration((int) ($movie->getDuration()));

        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($movie);

        if (count($violations) > 0) {
            throw new MovieValidatorException($violations);
        }
    }

}
