<?php
namespace App\Controllers;

use App\Core\Controller;

class Admin extends Controller
{

    public function index()
    {
        $this->render('admin.dashboard',[ 'title' => 'Dashboard' ]);
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        header("Location:/system/login");
    }

}
