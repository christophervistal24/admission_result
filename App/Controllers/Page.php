<?php
namespace App\Controllers;

use App\Core\Controller;

class Page extends Controller
{
    public function notFound()
    {
        dd('404 not found');
    }
}
