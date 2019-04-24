<?php
namespace App\Controller;


use App\Core\Controller;
use App\Core\Functions;
use App\Helpers\Outputter\Transformer;
use App\Models\AdmissionResult;
use App\Models\GuidanceConselor;

class Admin extends Controller
{
    use Functions;

    private $model;
    private $profile_info;
    private $deleted_admission_results;
    protected $sample;

    public function __construct()
    {
        $this->user      = load('Models\User');
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
        $this->guidance  = load('Models\GuidanceConselor');
        $this->course    = load('Models\Course');

        $this->data();
    }

    private function data()
    {
        $this->deleted_admission_results = $this->admission->deletedResults();
        $this->admission_results         = $this->admission->results();
        $user_info                 = $this->user_info->where('user_id',$_SESSION['id']);

        return [
                'title'                           => '| Dashboard',
                'info'                            => Transformer::toArray($user_info),
                'admission_result'                => Transformer::toArray($this->admission_results),
                'deleted_admission_results'       => Transformer::toArray($this->deleted_admission_results),
                'no_of_users'                     => $this->user->count(),
                'guidance_conselors'              => count($this->guidance->get()),
                'no_of_admission_results'         => count( $this->admission_results ),
                'no_of_deleted_admission_results' => count( $this->deleted_admission_results ),
            ];
    }


    public function index()
    {
        load('ViewComposer\AdminViewComposer');
        // if (!Functions::before_every_protected_page()) {
            $data = $this->data();
            $this->render('admin/dashboard',$data);
        // }
    }

    public function create()
    {
            $data['title'] = 'Dashboard';
            $data['info'] = (array)  $this->user_info->where('user_id',$_SESSION['id']);
            $data['admission_result']          = (array) $this->admission_results;
            $data['deleted_admission_results'] = (array) $this->deleted_admission_results;
            
            $this->render('admin.create',$data);
    }


// --------------------------------------------------------------------------------------------------
    public function new()
    {
        if (!Functions::before_every_protected_page()) {
        $data['title']                     = 'Add';
        $data['school_year']               = date('Y')  . ' - ' . date('Y',strtotime("+ 1 year"));
        $data['info']                      = (array) $this->user_info;
        $data['deleted_admission_results'] = $this->deleted_admission_results;
        $data['course']                    =  $this->course->getCourse();
        $data['guidance_conselors']        = [ (array)$this->guidance->get()[0] ]; 


        $this->render('admin/new',$data);
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

    public function print2()
    {
         if (!Functions::before_every_protected_page()) {
            if (isset($_GET['id'])) {
                  $data['id'] = $_GET['id'];
             }
             $this->render('admin/print2',$data);
         }
    }

    public function print3()
    {
         if (!Functions::before_every_protected_page()) {
            if (isset($_GET['id'])) {
                  $data['id'] = $_GET['id'];
             }
             $this->render('admin/print3',$data);
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

             $this->render('admin/vprofile',$fetch_data);
        }

    }

    public function profile()
    {
         if (!Functions::before_every_protected_page()) {
                    $data['info'] = $this->profile;
                    $data['deleted_admission_results'] = $this->deleted_admission_results;

                    $this->render('admin/profile',$data);
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

            $this->render('admin/editresult',$data + $fetch_course);
        }

    }

    public function addguidance()
    {
        if (!Functions::before_every_protected_page()) {
                $data['info'] = $this->profile;
                $data['deleted_admission_results'] = $this->deleted_admission_results;

                $this->render('admin/addguidance',$data);
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
                 'admission_id'      => $_GET['a_id'],
                 'entrace_rating_id' => $_GET['e_r_id'],
                 'examiner_info_id'  => $_GET['e_i_id'],
             ];
            $result = $this->model->permanent_delete_admission($ids);
        }
    }

    public function changeinfo()
    {
         if (!Functions::before_every_protected_page()) {
                    $data['info'] = $this->profile;
                    $data['deleted_admission_results'] = $this->deleted_admission_results;

                    $this->render('admin/changeinfo',$data);
        }
    }

   /* public function createnew()
    {
        if (!Functions::before_every_protected_page()) {
            $data['title']                     = 'Dashboard';
            $data['info']                      = $this->profile;
            $data['admission_result']          = $this->model->getAllAdmissionResult();
            $data['deleted_admission_results'] = $this->deleted_admission_results;
            
            $this->render('admin.create',$data);
        }
    }*/

    public function restore()
    {
        if (isset($_GET['a_id']) && !Functions::before_every_protected_page()) {
            $data['id'] = $_GET['a_id'];
            $result     = $this->model->modify_admission_result($data['id'],'NO');
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

            $this->render('admin/list',$data);
        }
    }

     public function editguidance()
    {
        if (!Functions::before_every_protected_page()) {
            if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];
            }
            
            $data['info'] = $this->profile;
            $data['deleted_admission_results']   = $this->deleted_admission_results;
            $fetch_data['counselor_information'] = $this->model
                                                        ->getGuidanceConselorByName($data['id']);
            $this->render('admin/editguidance',$data + $fetch_data);
        }
    }

    public function logout()
    {
        $this->render('admin/logout');
    }
}
