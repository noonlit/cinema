<?php

namespace Entity;

use Symfony\Component\Validator\Validation;

class RoomValidator {

    public function validate(RoomEntity $room) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($room);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                throw new \Exception($violation->getMessage());
            }
        }
    }

}