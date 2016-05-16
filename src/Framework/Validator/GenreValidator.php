<?php

namespace Framework\Validator;

use Entity\GenreEntity;
use Symfony\Component\Validator\Validation;

class GenreValidator {

    /**
     * 
     * @param \Entity\GenreEntity $genre
     */
    public function validate(GenreEntity $genre) {

        $validator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorMetadata')
                ->getValidator();
        $violations = $validator->validate($genre);

        if (count($violations) > 0) {
            $errors="";
            foreach ($violations as $violation) {
               $errors .= $errors. '.' . $violation->getMessage();
            }
            throw new \Exception($errors);
        }
    }

}
