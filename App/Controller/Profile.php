<?php
namespace App\Controller;

use App\Core\Controller;

class Profile extends Controller
{
    public function __construct()
    {
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
    }

    public function index()
    {
        $this->render('admin.profile.index', [
            'title'                     => 'Profile',
            'deleted_admission_results' => $this->admission->deletedResults(),
        ]);
    }

    public function edit()
    {
        $data['deleted_admission_results'] = $this->admission->deletedResults();
        $this->render('admin.profile.edit',$data);
    }


}
