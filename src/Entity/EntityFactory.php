<?php

namespace Entity;

use Framework\Util\CaseConverterTrait;

class EntityFactory
{
    use CaseConverterTrait;

    /**
     * Creates an entity from an array of properties.
     * 
     * @param string $entityName
     * @param array $properties
     * @return object The entity
     */
    public function createFromArray($entityName, array $properties)
    {
        $className = '\\Entity\\' . ucfirst(strtolower($entityName)) . 'Entity';

        if (!class_exists($className)) {
            return null;
        }

        // get a reflection
        $entityReflection = new \ReflectionClass($className);
        
        // get an instance
        $entity = $entityReflection->newInstance();
        
        // call setters for each property
        foreach ($properties as $key => $value) {
            $setter = "set{$this->snakeToStudlyCaps($key)}";
            if (method_exists($entity, $setter)) {
                
                // date needs conversion
                switch ($setter){
                    case 'setDate':
                        // date needs special treatment. note: displayed format is assumed dd.mm.yy
                        $format = 'd.m.Y';
                        $value = \DateTime::createFromFormat($format, $value);
                        call_user_func_array(array($entity, $setter), array($value));
                        break;
                    default: 
                    call_user_func_array(array($entity, $setter), array($value));
                }
            }          
        }
        
//        $this->validate($entityName, $entity);       
        return $entity;        
    }
    
    /**
     * Validates an entity.
     * 
     * @param string $entityName
     * @param AbstractEntity $entity
     * @throws \Exception If the validator doesn't exist
     */
    
    public function validate($entityName, $entity) {
        $validatorName = '\\Framework\\Validator\\' . ucfirst($entityName) . 'Validator';
        
        if (!class_exists($validatorName)) {
            throw new \Exception('A validator for this entity does not exist yet.');
        }
        
        // get a reflection
        $validatorReflection = new \ReflectionClass($validatorName);
        
        // get an instance
        $validator = $validatorReflection->newInstance();
                
        // validate
        $validator->validate($entity);
    }
}
