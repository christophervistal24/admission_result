<?php
namespace App\Helpers;

class Str
{
    public static function replace(string $search, string $replace, string $subject) :string
    {
        return str_replace($search, $replace, $subject);
    }

    public static function contains(string $haystack, string $needle) :bool
    {
        return strpos($haystack, $needle) !== false;
    }

    public static function before(string $needle, string $haystack) : string
    {
        return strtok($haystack, $needle);
    }

    public static function after(string $needle, string $haystack) : string
    {
        return substr(strrchr($haystack, $needle), 1);
    }

}
