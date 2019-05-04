<?php 
namespace App\Helpers;

class Session
{
    public static function set(string $key , $value = '')
    {
        $_SESSION[$key] = $value;
    }

    public static function has(string $key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get(string $key)
    {
        if ( self::has($key) ) {
            return $_SESSION[$key];
        } 
        return "No available value from this {$key} key";
    }
}
