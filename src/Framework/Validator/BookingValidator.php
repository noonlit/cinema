<?php

namespace Framework\Validator;

use Symfony\Component\Validator\Validation;

class BookingValidator {

    public function validate(BookingEntity $booking) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($booking);       
        if (count($violations) > 0) {
            $errors = "";
            foreach ($violations as $violation) {
                $errors .= $violation->getMessage() . PHP_EOL;
            }
            throw new \Exception($errors);
        }
    }

}