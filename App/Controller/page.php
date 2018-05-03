<?php
namespace App\Controller;
use App\Model\User;
use App\Core\Controller;

class Page extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new User;
    }
    public function index()
    {
        $this->render('templates/header');
        $this->render('templates/navbar');
        $this->render('index',[
            'title' => ' | Home',
            'sample' => 'Sample Data'
        ]);
        $this->render('templates/footer');
    }

    public function login()
    {
        $this->render('templates/header');
        $this->render('login');
    }

}