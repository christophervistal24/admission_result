<?php
namespace App\Helpers\Form;

use App\Helpers\Arr;
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

        // Filter and get all the fields that need to validate,
        $formFields = array_diff_assoc($rules, array_keys(array_filter($fields)));

        // Get all fields that has many rule.
        $hasManyRules = $this->fieldThatHasManyRule($formFields);

        // Get all fields with one rule.
        $onlyOneRule = array_diff_assoc($formFields, $hasManyRules);

        $this->validateFieldsWithOneRule($onlyOneRule);

        $this->validateFieldsWithManyRule($hasManyRules);
    }

    private function fail() :bool
    {
        return Session::has('errors');
    }

    private function validateFieldsWithOneRule(array $fields = [])
    {
        foreach ($fields as $field => $rule) {
             $this->checkRuleParameter($rule, $field);
        }
    }


    private function validateFieldsWithManyRule(array $fields = [])
    {
        foreach ($fields as $field => $value) {
            // Converting each field rules to array
            $fields[$field] = explode(',',$value);

            foreach ($fields[$field] as $rule) {
                $this->checkRuleParameter($rule, $field);
            }

        }
    }

    

    private function fieldThatHasManyRule(array $fields = [])
    {
        foreach ($fields as $fieldName => $rule) {
            if ( !$this->hasManyRule($rule) ) {
                  unset($fields[$fieldName]);
            }
        }
        return $fields;
    }

    private function removeNullableWithNoValue(array $items)
    {
        foreach ($items as $field => $rule) {
            if ( $this->isFieldNullable($field, $rule) ) {
                unset($items[$field]);
            } 
        }

        return $items;
    }

    

    // Extract this to it's own class
    private function setErrors(string $field, $message)
    {
        if ( !empty($message) ) {
            $this->errors[$field] = Str::replace('_',' ' ,$message);
            Session::set('errors', $this->errors);
        }
    }


}
