<?php
use App\Core\App;
use App\Helpers\Request;

require_once './App/init.php';


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$app = new App;
