<?php
namespace App\Controller;
use \App\Model\User;
use \App\Core\Controller;
use \App\Core\Functions;
class Admin extends Controller
{
    use Functions;

    private $model;
    private $profile_info;
    public function __construct()
    {
        $this->model = new User;
        $this->profile = $this->model->getUserInfoById($_SESSION['id']);
    }
    public function index()
    {
        if (!Functions::before_every_protected_page()) {
            $data['title']            = 'Dashboard';
            $data['info']             = $this->profile;
            $data['admission_result'] = $this->model->getAllAdmissionResult();
            $this->render('templates/header',$data);
            $this->render('admin/dashboard',$data);
            $this->render('templates/footer');
        }
    }

    public function new()
    {
        if (!Functions::before_every_protected_page()) {
        $data['title']       = 'Add';
        $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['info']        = $this->profile;
        $data['course']      = $this->model->getAllCourse();
        $this->render('templates/header',$data);
          /* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
        }*/
        $this->render('admin/new',$data);
        $this->render('templates/footer');
      }
    }

    public function print()
    {
         if (!Functions::before_every_protected_page()) {
            if (isset($_GET['id'])) {
                  $data['id'] = $_GET['id'];
             }
             $this->render('admin/print',$data);
         }
    }

    public function vprofile()
    {
        if (!Functions::before_every_protected_page()) {
             $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
             if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];
             }
             $data['info'] = $this->profile;
             $fetch_data['examiner_results'] = $this->model->getAdmissionResultById($data['id']);
             $this->render('templates/header',$data);
             $this->render('admin/vprofile',$fetch_data);
             $this->render('templates/footer');
        }

    }

    public function profile()
    {
        if (!Functions::before_every_protected_page()) {
                    $data['info'] = $this->profile;
                    $this->render('templates/header',$data);
                    $this->render('admin/profile',$data);
                    $this->render('templates/footer');
                }
    }

    public function editresult()
    {
        if (!Functions::before_every_protected_page()) {
            $data['school_year'] = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
            if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];
            }
            $data['info'] = $this->profile;
            $fetch_course['course']          = $this->model->getAllCourse();
            $data['examiner_results'] = $this->model->getAdmissionResultById($data['id']);
            $this->render('templates/header',$data);
            $this->render('admin/editresult',$data + $fetch_course);
            $this->render('templates/footer');
        }

    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $data['id'] = $_GET['id'];
            $result = $this->model->delete_admission_result($data['id']);
        }

    }

    public function logout()
    {
        Functions::after_successful_logout();
        $this->render('admin/logout');
    }
}