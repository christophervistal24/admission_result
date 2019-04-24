<?php
use App\Core\App;
use App\Services\Container;

require_once './App/init.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$app = new App;
