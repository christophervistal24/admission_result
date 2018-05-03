<?php
namespace App\Controller;
// use \App\Model\User as User;
use \App\Core\Controller;

class Student extends Controller
{
    public function index()
    {
        $this->render('student/test');
    }

    public function test()
    {
        $this->render('student/test');
    }

    public function new()
    {
        $this->render('student/new');
    }
}