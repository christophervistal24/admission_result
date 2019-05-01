<?php
namespace App\Core;

use App\Helpers\Str;
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
        $filename = Str::replace('.','/',$view);

        if ( !Str::contains($_GET['url'],'print')) {
            Template::loadFile('header' , $data);    
        }
        

        View::loadFile($filename, $data);

        if ( !Str::contains($_GET['url'],'print') ) {
            Template::loadFile('footer');
        }

    }

}
