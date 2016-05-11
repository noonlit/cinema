<?php
namespace Framework\Exception;

class MovieValidatorException extends \Symfony\Component\Security\Acl\Exception\Exception {
    
    /**
     *
     * @var type \Symfony\Component\Validator\ConstraintViolationList
     */
    private $violations;
    
    /**
     * 
     * @param \Symfony\Component\Validator\ConstraintViolationList $violations
     */
    public function __construct(\Symfony\Component\Validator\ConstraintViolationList $violations) {
        $this->violations = $violations;
    }
    
    /**
     * Creates error messages string from violation list.
     * 
     * @return string
     */
    public function getMessages() {
        $messages = '';
        foreach($this->violations as $violation) {
            $messages = $messages . "\n" . $violation->getMessage();
        }
        return $messages;
    }
    
}
