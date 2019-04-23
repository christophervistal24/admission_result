<?php 
namespace App\Helpers;

use App\Helpers\Loader;

class TemplateLoader extends Loader
{
    static $root_dir = APP['URL_ROOT'] . 'App/Views/templates/';
    
    public function loadFile(string $filename , array $data = [])
    {
        parent::load(self::$root_dir, $filename , $data);
    }
}
