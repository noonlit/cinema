<?php
namespace Entity;

use Symfony\Component\Validator\Validation;

class MovieValidator 
{
    /**
     * Checks if MovieEntity object is valid.
     * 
     * @param \Entity\MovieEntity $movie
     * @throws MovieValidatorException if MovieEntity object is invalid.
     */
    public function validate(MovieEntity $movie) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($movie);       
        if (count($violations) > 0) {
            $exception = new MovieValidatorException($violations);
            //var_dump($exception->getMessages());
            //throw new MovieValidatorException($violations);
        }      
    }

    
}

