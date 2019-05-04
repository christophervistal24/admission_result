<?php
namespace App\Helpers\Form;

use App\Helpers\Rule;
use App\Helpers\Session;
use App\Helpers\Str;

trait Validator
{
    use Rule;

    private $errors = [];


    public function validate(array $fields = [], array $rules = [])
    {

        $rules = $this->removeNullableWithNoValue($rules);

        // Filter and get all the fields that need to validate.
        $formFields = array_diff_assoc($rules, array_keys($fields));

        // Get all fields that has many rule.
        $hasManyRules = $this->fieldThatHasManyRule($formFields);

        // Seperate fields with one rule.
        $onlyOneRule = array_diff_assoc($formFields, $hasManyRules);

        $this->validateWithOneRule($onlyOneRule,$fields);

        $this->validateWithManyRule($hasManyRules,$fields);
    }

     private function validateWithOneRule(array $fields = [] , $values = [])
    {
        foreach ($fields as $field => $rule) {
             if ( $this->isRuleHasParameter($rule) ) {
                    $value = $this->getRuleValue($rule);
                    $rule  = $this->getOnlyTheRule($rule);
                    $this->setErrors($field, $this->$rule($value, $values[$field] , $field));
            } else {
                $this->setErrors($field, $this->$rule($field,$values[$field]));
            }
        }
    }


     private function validateWithManyRule(array $fields = [], array $values)
    {

        foreach ($fields as $field => $value) {
            
            // Converting each field rules to array
            $fields[$field] = explode(',',$value);

             foreach ($fields[$field] as $rule) {

                 if ( $this->isRuleHasParameter($rule) ) {
                    $value = $this->getRuleValue($rule);
                    $rule  = $this->getOnlyTheRule($rule);
                    $this->setErrors($field, $this->$rule($value, $values[$field] , $field));
                 } else { 
                    $this->setErrors($field, $this->$rule($field, $values[$field]));
                 }

            }

        }
    }

    private function removeNullableWithNoValue(array $items)
    {
        foreach ($items as $field => $rule) {
            $fieldValue = $this->request->$field;
            if ( Str::contains($rule, 'nullable') && $this->required($field, $fieldValue) ) {
                unset($items[$field]);
            } 
        }

        return $items;
    }

    private function fail() :bool
    {
        return Session::has('errors');
    }

    private function setErrors(string $field, $message)
    {
        if ( !empty($message) ) {
            $this->errors[$field] = Str::replace('_',' ' ,$message);
            Session::set('errors', $this->errors);
        }
    }


}
