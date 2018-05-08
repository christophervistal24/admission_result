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
        $data['admission_result'] = $this->model->getAllAdmissionResult();
        $this->render('templates/header',$data);
        $this->render('admin/dashboard',$data);
        $this->render('templates/footer');
    }

    public function new()
    {
        $data['title']       = 'Add';
        $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['course']      = $this->model->getAllCourse();
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

    public function vprofile()
    {
        $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        if (isset($_GET['id'])) {
            $data['id'] = $_GET['id'];
        }
        $fetch_data['examiner_results'] = $this->model->getAdmissionResultById($data['id']);
        $this->render('templates/header',$data);
        $this->render('admin/vprofile',$fetch_data);
        $this->render('templates/footer');
    }

    public function editresult()
    {
        $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        // if (isset($_GET['id'])) {
        //     $data['id'] = $_GET['id'];
        // }
        // $data['examiner_results'] = $this->model->getAdmissionResultById($data['id']);
        $this->render('templates/header',$data);
        $this->render('admin/editresult',$data);
        $this->render('templates/footer');
    }
}