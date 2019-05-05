<?php
namespace App\Helpers;

use App\Core\Auth;
use App\Core\QueryBuilder as DB;
use App\Helpers\Arr;
use App\Helpers\Session;
use App\Helpers\Str;

trait Rule
{

    private function required($item, $value)
    {
        $value = ($this->request->isFile($item)) ? $value['name'] : $value;

        if (empty(str_replace(' ' , '' , $value))) {
            return $item . ' is required';
        } 
    }

    private function mimes(string $types, array $file, string $item)
    {
        $imageType = empty($file['type']) ? 'image' : $file['type'];

        if ( !Str::contains($types,$imageType) ) {
            return "{$item} must be " . Str::replace('|', ' , ', $types);            
        }
        
    }

    private function min(int $length, string $value, string $field)
    {
        if (strlen($value) < $length ) {
            return "{$field} must be minimum of {$length} characters";
        }
    }

    private function max(int $length, string $value, string $field)
    {
        if (strlen($value) > $length ) {
            return "{$field} must be maximum of {$length} characters";
        }
    }

    public function unique(string $table, string $value, string $column)
    {
        $result = DB::table($table)->select($column)->where($column,'=',$value)->get();
        if (count($result) > 0 && Auth::user()->username != $value) {
            return "{$column} is already exists";
        }
    }

    public function confirm(string $originalField, string $confirmFieldValue, string $confirmField)
    {
        if ( $this->request->$originalField !== $confirmFieldValue ) {
            return "{$originalField} and " . ucfirst($confirmField) . " must be equal.";            
        }
    }

    public function nullable(string $fieldName, string $value)
    {
        
    }

    private function getOnlyTheRule(string $rule)
    {
        return Str::before(':', $rule);
    }

    private function getRuleValue(string $rule)
    {
        return Str::after(':', $rule);
    }

    private function isRuleHasParameter(string $rule)
    {
        return Str::contains($rule, ':');
    }

    private function checkRuleParameter(string $rule, string $field)
    {
        if ( $this->isRuleHasParameter($rule) ) {
            $this->ruleHavingParameter($rule,$field);
        } else {
            $this->ruleDoesntHaveParameter($rule,$field);
        }
    }

    private function ruleHavingParameter(string $rule, string $field)
    {
        $value = $this->getRuleValue($rule);
        $rule  = $this->getOnlyTheRule($rule);
        $this->setErrors($field, $this->$rule($value, $this->request->$field, $field));
    }

    private function ruleDoesntHaveParameter(string $rule, string $field)
    {
        $this->setErrors($field, $this->$rule($field, $this->request->$field));   
    }

    private function hasManyRule(string $rule)
    {
        return Str::contains($rule , ',');
    }

    private function isFieldNullable(string $field, string $rule)
    {
        return Str::contains($rule, 'nullable') && $this->required($field, $this->request->$field);
    }

}
