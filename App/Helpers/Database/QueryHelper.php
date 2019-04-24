<?php 
namespace App\Helpers\Database;

trait QueryHelper
{
    public static function reOrderGivenFields($childList , $baseList) :array
    {
        uksort($childList, function($key1, $key2) use ($baseList) {
            return (array_search($key1, $baseList) > array_search($key2, $baseList));
        });
        return $childList;
    }

    public static function removeUnnecessaryColumns(array $childList , array $baseList ) :array
    {
       return array_filter($childList, function($k) use($baseList) {
                return in_array($k,$baseList) ;
            }, ARRAY_FILTER_USE_KEY);
    }

    public static function columnsAndValues(array $list) : array
    {
        return [
            'columns' => '`'. implode('`,`',array_keys($list)) . '`',
            'values' => self::generateValuesForTable($list),
        ];
    }

    public static function prepareSetStatement(array $columns = [], $model) :string 
    {  
        $statement = null;
        
        foreach ($columns as $column) {
            $statement .=  $column . "='" .  $model->$column . "',";
        }

        return rtrim($statement, ',');
    }

    private static function generateValuesForTable(array $list) :string
    {
        return "'" . implode("','",$list) . "'";
    }


}
