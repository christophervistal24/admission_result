<?php 
namespace App\Helpers;

use App\Helpers\Loader;

class ViewLoader extends Loader
{
    private static $root_dir = APP['URL_ROOT'] . 'App/Views/';

    public function loadFile(string $filename , array $data = [])
    {
        parent::load(self::$root_dir, $filename,$data);
    }
}
