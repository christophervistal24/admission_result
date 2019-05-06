<?php
/**
* The error is here, there are some pages that not used templates
*/

namespace App\Core;

use App\Helpers\Str;
use App\Helpers\TemplateLoader as Template;
use App\Helpers\ViewLoader as View;

class Controller
{
    public function render(string $view, array $data = [])
    {
        // Replace all (dot) with / accessing a directory
        $filename = Str::replace('.','/',$view);
        
        // Throw an error if the url is not set
         if ( !Str::contains($_GET['url'],'print') ) {
                Template::loadFile('header' , $data);    
         }
        

        View::loadFile($filename, $data);

        // Throw an error if the url is not set
        if ( !Str::contains($_GET['url'],'print') ) {
                Template::loadFile('footer');
        }    

    }

}
