<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework\Validator;
use Symfony\Component\Validator\Validation;
/**
 * Description of UserValidator
 *
 * @author marius
 */
class UserValidator
{
    public function validate(\Entity\UserEntity $user) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($user);
        if (count($violations) > 0) {
            $errors = "";
            foreach ($violations as $violation) {
                $errors .= $violation->getMessage() . PHP_EOL;
            }
            throw new \Exception($errors);            
        }
    }
}
