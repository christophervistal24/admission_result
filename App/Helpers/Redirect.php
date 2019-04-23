<?php 
namespace App\Helpers;

class Redirect
{
    private const PREFIX_LOCATION = 'Location:/system/';

    public static function to(string $route)
    {
        header(self::PREFIX_LOCATION  . "{$route}");
        return new static;
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
