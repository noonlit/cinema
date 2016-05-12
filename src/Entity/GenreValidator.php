<?php

namespace Entity;

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
            foreach ($violations as $violation) {
                throw new \Exception($violation->getMessage());
            }
        }
    }

}
