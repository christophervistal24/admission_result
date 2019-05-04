<?php 
namespace App\Helpers;

use App\Helpers\Str;

class Redirect
{
    private const PREFIX_LOCATION = 'Location:/system/';

    public static function to(string $route)
    {
        header(self::PREFIX_LOCATION  . "{$route}");
        return new static;
    }

    public static function back()
    {
        $needle = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/system/";
        $route = Str::replace($needle, '', $_SERVER['HTTP_REFERER']);
        header(self::PREFIX_LOCATION  . "{$route}");
        return new static;
    }

    public function with(string $key , string $message)
    {
        $_SESSION[$key] = $message;
    }

    public function withData(array $data = [])
    {
        return new static;
    }

    public function withErrors(string $message)
    {
        $_SESSION['errors'] = $message;
        return new static;
    }
}
