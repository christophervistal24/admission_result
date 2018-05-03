<?php

define('APP',[
    'URL_ROOT' => str_replace("\\","/",dirname(__DIR__)) . "/",
    'APP_ROOT' => str_replace("\\","/",dirname(__DIR__)) . "/App/",
    'DOC_ROOT' =>  "/" . str_replace("\\","/",basename(dirname(__DIR__))) . "/",
]);

require_once APP['URL_ROOT'] . 'vendor/autoload.php';
