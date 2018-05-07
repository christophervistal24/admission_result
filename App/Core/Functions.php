<?php
namespace App\Core;
trait Functions
{
    private $input = [];
    public function is_post()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function escape(array $data)
    {
        array_walk($data,function($user_input,$keys){
            $this->input[$keys] = htmlspecialchars($user_input);
        });
       return $this->input;
    }
}