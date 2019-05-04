<?php
namespace App\Controller;

use App\Core\Controller;

class Rankings extends Controller
{
    public function __construct()
    {
        $this->admission = load('Models\AdmissionResult');
    }
    public function index()
    {
        $this->render('admin.ranking.index',[
            'title'    => 'Rankings',
            'rankings' => $this->admission->rankings(),
        ]);
    }
}
