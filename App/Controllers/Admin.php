<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Outputter\Transformer;

class Admin extends Controller
{

    private $deleted_admission_results;

    public function __construct()
    {
        $this->user      = load('Models\User');
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
        $this->guidance  = load('Models\GuidanceConselor');
        $this->course    = load('Models\Course');

        // $this->data();
    }

    private function data()
    {
        $this->deleted_admission_results = $this->admission->deletedResults();
        $this->admission_results         = $this->admission->results();
        $user_info                       = $this->user_info->where('user_id', Sesssion::get('id'));
        
        return [
                'title'                           => 'Dashboard',
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
            $data = $this->data();
            $this->render('admin.dashboard',$data);
    }

    public function create()
    {
            $data['title'] = 'Dashboard';
            $data['admission_result']          = (array) $this->admission_results;
            $data['deleted_admission_results'] = (array) $this->deleted_admission_results;
            
            $this->render('admin.create',$data);
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        header("Location:/system/login");
    }

}
