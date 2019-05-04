<?php
namespace App\Helpers;

use App\Helpers\Str;

class Arr
{
    public static function find(string $find, array $items) : array
    {
        $keys = [];
        foreach ($items as $key => $value) {
            if ( Str::contains($value, $find) ) {
                $keys[] = $key;             
            }
        }
        return $keys;
    }

    public static function flatten(array $array = [])
    {
        $result = array();

        if (!is_array($array)) {
            $array = func_get_args();
        }

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::flatten($value));
            } else {
                $result = array_merge($result, array($key => $value));
            }
        }

        return $result;
    }
}
