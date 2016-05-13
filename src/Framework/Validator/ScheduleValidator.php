<?php

namespace Framework\Validator;

use Symfony\Component\Validator\Validation;

class ScheduleValidator {

    public function validate(\Entity\ScheduleEntity $schedule) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($schedule);
        if (count($violations) > 0) {
            $errors = "";
            foreach ($violations as $violation) {
                $errors .= $violation->getMessage() . PHP_EOL;
            }
            throw new \Exception($errors);            
        }
    }

}