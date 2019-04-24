<?php
namespace App\Controller;

use App\Core\Controller;

class Admission extends Controller
{


    public function __construct()
    {
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
        $this->guidance  = load('Models\GuidanceConselor');
        $this->course    = load('Models\Course');
    }

    private function data()
    {
        return [
            'info'                      => (array) $this->user_info->where('user_id',$_SESSION['id']),
            'deleted_admission_results' => $this->admission->deletedResults(),
            'course'                    =>  $this->course->getCourse(),
            'guidance_conselors'        => [ (array) $this->guidance->get()[0] ], 
        ];
    }

    public function index()
    {

    }
    
    public function create()
    {
        $this->render('admin.admission.create',[
            'title'                     => 'Add',
            'info'                      => $this->data()['info'],
            'course'                    => $this->data()['course'],
            'deleted_admission_results' => $this->data()['deleted_admission_results'],
            'course'                    => $this->data()['course'],
            'guidance_conselors'        => $this->data()['guidance_conselors'], 
        ]);
    }

    public function store()
    {
        dd('Process for storing..');
    }
}
