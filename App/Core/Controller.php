<?php
namespace App\Core;
class Controller
{

    public function render($view  , $data = [])
    {
        if (file_exists('../App/Views' . $view . '.php')) {
            require_once '../App/Views/layouts/header.php';
            require_once '../App/Views' . $view . '.php';
            require_once '../App/Views/layouts/footer.php';
        }
    }

}