<?php

namespace Framework\Validator;

use Symfony\Component\Validator\Validation;

class UserValidator
{

    /**
     * @param \Entity\UserEntity $user
     *
     * @throws \Exception
     */
    public function validate(\Entity\UserEntity $user)
    {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($user);

        if (count($violations) > 0) {
            $errors = "";
            foreach ($violations as $violation) {
                $errors .= $violation->getMessage().PHP_EOL;
            }
            throw new \Exception($errors);
        }
    }

}
