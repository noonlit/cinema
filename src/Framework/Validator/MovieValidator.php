<?php

namespace Framework\Validator;

use Symfony\Component\Validator\Validation;

class MovieValidator
{

    /**
     * Checks if MovieEntity object is valid.
     * 
     * @param \Entity\MovieEntity $movie
     * @throws Exception if MovieEntity object is invalid.
     */
    public function validate(\Entity\MovieEntity $movie)
    {
        /* Cast numeric attributes to int. */
        $movie->setYear((int) ($movie->getYear()));
        $movie->setDuration((int) ($movie->getDuration()));

        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($movie);

        if (count($violations) > 0) {
            $errors = '';
            foreach($violations as $violation) {
                $errors .= $violation->getMessage() . PHP_EOL;
            }
            throw new \Symfony\Component\Security\Acl\Exception\Exception($errors);
        }
    }

}
