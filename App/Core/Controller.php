<?php
namespace App\Core;
class Controller
{
    public function model($model)
    {
        if (file_exists('../App/Model/' . $model . '.php')) {
            require_once '../App/Model/' . $model . '.php';
            return new $model;
        }
    }

    public function make($view , $data = [])
    {
     if (file_exists('../App/Views/' . $view . '.php')) {
            include_once '../App/Views/layouts/header.php';
            require_once '../App/Views/' . $view . '.php';
            include_once '../App/Views/layouts/footer.php';
        }
    }
}