<?php
namespace App\Controller;
use \App\Model\Database as DB;
use \App\Model\User as User;
class Page extends \App\Core\Controller
{

    public function index()
    {

        Page::make('index',[
            'title'     => 'Title Here',
            'data'      => 'Sample Data',
            'user_info' => User::fetch_data(),
        ]);
    }

}