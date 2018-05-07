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
    public function login()
    {
        $data['title'] = 'Login';
        $data['copyright'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['user'] = $this->model->userLogin($_POST);
        $this->render('templates/header',$data);
        $this->render('login',$data);
        $this->render('templates/footer');
    }

}