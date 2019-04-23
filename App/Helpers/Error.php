<?php 
namespace App\Helpers;

use Exception;

class Error
{
    public static function throwA422(string $message)
    {
        throw new Exception($message, 422);
    }

    public static function throwA500(string $message)
    {
        throw new Exception($message, 500);
    }

}
