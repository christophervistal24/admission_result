<?php

use App\Core\App;
use App\Core\Controller;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require_once './App/init.php';

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$app = new App;
