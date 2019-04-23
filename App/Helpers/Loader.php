<?php 
namespace App\Helpers;

use App\Helpers\Error;

abstract class Loader
{
    final protected static function load(string $directory, string $filename, array $data = [])
    {
        if (file_exists( $directory . $filename . '.php')) {

            // Add some data to view
            empty($data) ? : extract($data);

            include_once $directory . $filename . '.php';
            
        } else {

            $file_array = explode('/',$filename);

            $size = sizeof($file_array) - 1;

            $message = 'Can\'t find '.$file_array[$size].' in ' .$file_array[$size - 1]. ' directory';

            Error::throwA500($message);
        }
    }
}
