<?php
namespace App\Controller;
class Page extends \App\Core\Controller
{
    public function index()
    {

        Page::make('index',[
            'Data' => 'Sample Data'
        ]);
    }

}