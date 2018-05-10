<?php
namespace App\Controller;
use App\Model\User;
use App\Core\Controller;
use App\Core\Functions;

class Page extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new User;
    }
    public function index()
    {
        if (!Functions::after_login()) {
            $data['title']     = 'Login';
            $data['copyright'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
            $data['user']      = $this->model->userLogin($_POST);
            $this->render('templates/header',$data);
            $this->render('index',$data);
            $this->render('templates/footer');
        }

    }

}