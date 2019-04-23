<?php
namespace App\Core;

use App\Helpers\TemplateLoader as Template;
use App\Helpers\ViewLoader as View;

class Controller
{
    public function render(string $view, array $data = [])
    {
        
        /**
         * The error is there are some pages that not used templates
         */

        // Replace all (dot) with / accessing a directory
        $filename = str_replace('.','/', $view);

        Template::loadFile('header' , $data);

        View::loadFile($filename, $data);

        Template::loadFile('footer');
    
       
    }

}
