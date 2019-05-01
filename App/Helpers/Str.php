<?php
namespace App\Helpers;

class Str
{
    public static function replace(string $search, string $replace, string $subject)
    {
        return str_replace($search, $replace, $subject);
    }

    public static function contains(string $haystack, string $needle)
    {
        return strpos($haystack, $needle) !== false;
    }
}
