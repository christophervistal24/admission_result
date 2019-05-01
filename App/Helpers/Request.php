<?php 
namespace App\Helpers;

use App\Helpers\Error;

use Exception;

class Request
{   

    public function post()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    private function get(string $field_name)
    {
        return $_GET[$field_name] ?? $_POST[$field_name] ?? $_FILES[$field_name] ?? null;
    }

    public function __get(string $name)
    {
        if ( !is_null($this->get($name)) ) {
            return $this->get($name);
        } 
        
        Error::throwA422('Undefined ' . $name . ' field, Please check every name to your forms');    
    }

}
