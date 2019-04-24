<?php 
namespace App\Helpers\Outputter;

class Transformer 
{
    public static function toArray($items) :array
    {
        return (array) $items;
    }
}
