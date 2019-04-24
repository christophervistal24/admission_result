<?php
namespace App\Controller;

use App\Core\Controller;

class UserProfile extends Controller
{
    public function __construct()
    {
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
    }

    public function index()
    {
        $data['info'] = (array) $this->user_info->withCredentials($_SESSION['id']);
        $data['deleted_admission_results'] = $this->admission->deletedResults();
        $this->render('admin.profile',$data);
    }

    public function edit()
    {
        $data['info'] = (array) $this->user_info->withCredentials($_SESSION['id']);
        $data['deleted_admission_results'] = $this->admission->deletedResults();
        $this->render('admin.changeinfo',$data);
    }
}
