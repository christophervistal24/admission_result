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
    private $deleted_admission_results;
    public function __construct()
    {
        $this->model = new User;
        $this->profile = $this->model->getUserInfoById(@$_SESSION['id']);
        $this->deleted_admission_results = $this->model->get_deleted_admission_results();
    }
    public function index()
    {
        if (!Functions::before_every_protected_page()) {
            $data['title']                           = 'Dashboard';
            $data['info']                            = $this->profile;
            $data['admission_result']                = $this->model->getAllAdmissionResult();
            $data['guidance_conselors']              = count($this->model->getAllGuidanceConselors());
            $data['no_of_admission_results']         = count($this->model->getAllAdmissionResult());
            $data['no_of_deleted_admission_results'] = count($this->deleted_admission_results);
            $data['no_of_users']                     = count($this->model->count_user());
            $data['deleted_admission_results']       = $this->deleted_admission_results;
            $this->render('templates/header',$data);
            $this->render('admin/dashboard',$data);
            $this->render('templates/footer');
        }
    }

    public function new()
    {
        if (!Functions::before_every_protected_page()) {
        $data['title']                     = 'Add';
        $data['school_year']               = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['info']                      = $this->profile;
        $data['deleted_admission_results'] = $this->deleted_admission_results;
        $data['course']                    = $this->model->getAllCourse();
        $data['guidance_conselors']        = $this->model->getAllGuidanceConselors();
        $this->render('templates/header',$data);
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
             $data['deleted_admission_results'] = $this->deleted_admission_results;
             $fetch_data['examiner_results']    = $this->model->getAdmissionResultById($data['id']);
             $this->render('templates/header',$data);
             $this->render('admin/vprofile',$fetch_data);
             $this->render('templates/footer');
        }

    }

    public function profile()
    {
         if (!Functions::before_every_protected_page()) {
                    $data['info'] = $this->profile;
                    $data['deleted_admission_results'] = $this->deleted_admission_results;
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
            $fetch_course['course']            = $this->model->getAllCourse();
            $data['examiner_results']          = $this->model->getAdmissionResultById($data['id']);
            $data['deleted_admission_results'] = $this->deleted_admission_results;
            $data['guidance_conselors']        = $this->model->getAllGuidanceConselors();
            $this->render('templates/header',$data);
            $this->render('admin/editresult',$data + $fetch_course);
            $this->render('templates/footer');
        }

    }

    public function addguidance()
    {
        if (!Functions::before_every_protected_page()) {
                $data['info'] = $this->profile;
                $data['deleted_admission_results'] = $this->deleted_admission_results;
                $this->render('templates/header',$data);
                $this->render('admin/addguidance',$data);
                $this->render('templates/footer');
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) && !Functions::before_every_protected_page()) {
            $data['id'] = $_GET['id'];
            $result = $this->model->modify_admission_result($data['id'],'YES');
        }
    }

     public function permanent_delete()
    {
         if (isset($_GET['a_id']) && !Functions::before_every_protected_page()) {
             $ids = [
                 'admission_id' => $_GET['a_id'],
                 'entrace_rating_id' =>$_GET['e_r_id'],
                 'examiner_info_id' => $_GET['e_i_id'],
             ];
            $result = $this->model->permanent_delete_admission($ids);
        }
    }

    public function changeinfo()
    {
         if (!Functions::before_every_protected_page()) {
                    $data['info'] = $this->profile;
                    $data['deleted_admission_results'] = $this->deleted_admission_results;
                    $this->render('templates/header',$data);
                    $this->render('admin/changeinfo',$data);
                    $this->render('templates/footer');
        }
    }

    public function createnew()
    {
        if (!Functions::before_every_protected_page()) {
            $data['title']            = 'Dashboard';
            $data['info']             = $this->profile;
            $data['admission_result'] = $this->model->getAllAdmissionResult();
            $data['deleted_admission_results'] = $this->deleted_admission_results;
            $this->render('templates/header',$data);
            $this->render('admin/createnew',$data);
            $this->render('templates/footer');
        }
    }

    public function restore()
    {
        if (isset($_GET['a_id']) && !Functions::before_every_protected_page()) {
            $data['id'] = $_GET['a_id'];
            $result = $this->model->modify_admission_result($data['id'],'NO');
        }
    }

    public function list()
    {
        if (!Functions::before_every_protected_page()) {
            $data['title']                     = 'List of Guidance Counselor';
            $data['info']                      = $this->profile;
            $data['admission_result']          = $this->model->getAllAdmissionResult();
            $data['deleted_admission_results'] = $this->deleted_admission_results;
            $data['guidance_conselors']        = $this->model->getAllGuidanceConselors();
            $this->render('templates/header',$data);
            $this->render('admin/list',$data);
            $this->render('templates/footer');
        }
    }

     public function editguidance()
    {
        if (!Functions::before_every_protected_page()) {
            if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];
            }
            $data['info'] = $this->profile;
            $data['deleted_admission_results'] = $this->deleted_admission_results;
            $fetch_data['counselor_information'] = $this->model->getGuidanceConselorByName($data['id']);
            $this->render('templates/header',$data);
            $this->render('admin/editguidance',$data + $fetch_data);
            $this->render('templates/footer');
        }

    }

    public function logout()
    {
        $this->render('admin/logout');
    }
}