<?php 
namespace App\Helpers\Database;

use App\Helpers\Str;
use App\Helpers\Arr;

trait QueryHelper
{
    public static function reOrderGivenFields($childList , $baseList) :array
    {
        uksort($childList, function($key1, $key2) use ($baseList) {
            return (array_search($key1, $baseList) > array_search($key2, $baseList));
        });
        return $childList;
    }

    public static function removeUnnecessaryColumns(array $childList , array $baseList) :array
    {
        return Arr::filter($childList,$baseList);
    }

    public static function columnsAndValues(array $list) : array
    {
        return [
            'columns' => '`'. implode('`,`',array_keys($list)) . '`',
            'values' => self::generateValuesForTable($list),
        ];
    }

    private static function generateValuesForTable(array $list) :string
    {
        return "'" . implode("','",$list) . "'";
    }

    public static function prepareSetStatement(array $columns = [], $model) :string 
    {  
        $statement = null;
        
        foreach ($columns as $column) {
            $statement .=  $column . "='" .  $model->$column . "',";
        }

        return rtrim($statement, ',');
    }

    public static function prepareJoin(string $type = ' INNER JOIN ' , string $table , string $clauses) :string
    {
       $prefix = "{$type} {$table} ON "; 
      
       $query =  $prefix . $clauses;

       return Str::replace(' ON ' . $table, ' ON ', $query);
    }

    public function prepareWhereValues(array $columns) 
    {
        $iterator    = 0;
        $values      = null;
        $noOfColumns = count($columns);

        foreach ($columns as $column_name => $value) {
            $values .= "{$column_name} = '{$value}' ";

            // Iterator for tracking if we need to concat and AND keyword or not.            
            $iterator++;
        
            if ($iterator !== $noOfColumns) {
                $values .= ' AND ';
            }
            
        }
        
        return $values;
    }

    public static function prepareQueryStatements(array $statements = [])
    {
        // Sort all the statements by keys
        ksort($statements);
        // Flatten and conver to string
        return  implode(' ', Arr::flatten($statements));
    }
    
}
