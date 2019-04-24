<?php
namespace App\Controller;

use App\Core\Controller;
use App\Models\AdmissionResult;
use App\Models\Course;
use App\Models\GuidanceConselor;
use App\Models\User;
use App\Models\UserInfo;

class Guidance extends Controller
{
    public function __construct()
    {
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
        $this->guidance = load('Models\GuidanceConselor');
        $this->profile = (array) $this->user_info->where('user_id',$_SESSION['id']);
    }

    public function index()
    {
          $data['title']                     = 'List of Guidance Counselor';
          $data['info']                      = $this->profile;
          $data['admission_result']          = (array) $this->admission->results();
          $data['deleted_admission_results'] = (array) $this->admission->deletedResults();
          $data['guidance_conselors']        = [ (array) $this->guidance->get()[0] ];
        $this->render('admin.guidance.index', $data);
    }

    public function create()
    {
         $data['title'] = '| Add new Guidance Counselor';
         $data['info'] = $this->profile;
         $data['deleted_admission_results'] = $this->admission->deletedResults();
         
        $this->render('admin.guidance.create',$data);
    }

    public function edit()
    {
            if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];
            }
            
            $data['info'] = $this->profile;
            $data['deleted_admission_results']   = $this->admission->deletedResults();
            $fetch_data['counselor_information'] = (array) $this->guidance->find($data['id']);

            $this->render('admin.guidance.edit',$data + $fetch_data);
    }

}
