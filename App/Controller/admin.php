<?php
namespace App\Controller;
use \App\Model\User;
use \App\Core\Controller;

class Admin extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new User;
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->render('templates/header',$data);
        $this->render('admin/dashboard');
        $this->render('templates/footer');
    }

    public function new()
    {
        $data['title'] = 'Add';
        $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['course'] = $this->model->getAllCourse();
        $this->render('templates/header',$data);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
        }
        $this->render('admin/new',$data);
        $this->render('templates/footer');
    }

    public function print()
    {
        if (isset($_GET['id'])) {
            $data['id'] = $_GET['id'];
        }
        $this->render('admin/print',$data);
    }
}