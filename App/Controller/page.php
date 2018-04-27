<?php
namespace App\Controller;
// use \App\Model\User as User;
use \App\Core\Controller;

class Page extends Controller
{

    public function index()
    {
        Page::render('/index',[
            'title' => 'Home',
            'sample' => 'Sample Data'
        ]);
    }

}