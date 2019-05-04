<?php
namespace App\Helpers;

use App\Core\Auth;
use App\Core\QueryBuilder as DB;
use App\Helpers\Session;
use App\Helpers\Str;

trait Rule
{
    protected $mimes = [
        'png',
        'jpg',
        'gif'
    ];

    private function required(string $item, string $value)
    {
        if (empty(str_replace(' ' , '' , $value))) {
            return $item . ' is required';
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
        $result = DB::table($table)->select($column)->where($column,$value)->get();
        
        if (count($result) > 0 && Auth::user()->username != $value) {
            return "{$column} is already exists";
        }
    }

    public function confirm(string $originalField, string $fieldValue, string $confirmField)
    {
        if ( $this->request->$originalField !== $fieldValue ) {
            return "{$originalField} and " . ucfirst($confirmField) . " must be equal.";            
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

    private function getOnlyTheRule(string $rule)
    {
        preg_match("/^(.+)\:/", $rule, $matches);
        return $matches[1];
    }

    // Regular Expression temporary
    private function getRuleValue(string $rule)
    {
        preg_match("/([a-z|A-Z]|_|\d+)+$/", $rule, $matches);
        return array_shift($matches);
    }

    private function isRuleHasParameter(string $rule)
    {
        return Str::contains($rule, ':');
    }

    private function hasManyRule(string $rule)
    {
        return Str::contains($rule , ",");
    }

}