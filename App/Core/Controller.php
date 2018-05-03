<?php
namespace App\Core;
class Controller
{

    public function render($view  , $data = [])
    {
        if (file_exists(APP['URL_ROOT'] . 'App/Views/' . $view . '.php')) {
            extract($data);
            require_once APP['URL_ROOT'] . 'App/Views/' . $view. '.php';
        }
    }

}