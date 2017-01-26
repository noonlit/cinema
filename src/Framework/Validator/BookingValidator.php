<?php

namespace Framework\Validator;

use \Entity\BookingEntity;
use Symfony\Component\Validator\Validation;

class BookingValidator
{

    /**
     * @param \Entity\BookingEntity $booking
     *
     * @throws \Exception
     */
    public function validate(BookingEntity $booking)
    {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($booking);

        if (count($violations) > 0) {
            $errors = "";
            foreach ($violations as $violation) {
                $errors .= $violation->getMessage().PHP_EOL;
            }
            throw new \Exception($errors);
        }
    }

}
