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
        Page::render('/index',[
            'title' => 'Home',
            'sample' => 'Sample Data'
        ]);
    }

}