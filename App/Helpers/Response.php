<?php 
namespace App\Helpers;

class Response
{
    public static function json(array $items)
    {
        echo json_encode($items);
    }
}

