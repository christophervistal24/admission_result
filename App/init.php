<?php


session_start();

define('APP',[
    'URL_ROOT'      => str_replace("\\","/",dirname(__DIR__)) . "/",
    'APP_ROOT'      => str_replace("\\","/",dirname(__DIR__)) . "/App/",
    'DOC_ROOT'      =>  "/" . str_replace("\\","/",basename(dirname(__DIR__))) . "/",
]);


require_once APP['URL_ROOT'] . 'vendor/autoload.php';

function load(string $name) :object
{
    $container = new App\Services\Container();
    return $container->get('App\\' . $name);
}

// For development purpose
function dd($item)
{
    echo "<pre>";
    die(print_r($item,true));
}

class_alias('App\Core\Auth','Auth');
class_alias('App\Helpers\Admission\EquivalentCalculator','Equivalent');

