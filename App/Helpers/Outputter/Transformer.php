<?php 
namespace App\Helpers\Outputter;

class Transformer 
{
    public static function toArray($items) :array
    {
        return (array) $items;
    }

    public static function flattenArray(array $array) :array
    {
        $list = [];
        foreach ($array as $keys => $value) {
            $keys = trim($keys);
            if (is_array($value)) {
                foreach ($value as $key => $values) {
                    $list[$values] = $values;
                }
            } else {
                $list[$keys] = $value;
            }
        }
        return $list;
    }
}
