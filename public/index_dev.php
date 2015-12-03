<?php

use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;

require_once __DIR__.'/../vendor/autoload.php';

error_reporting(-1);

if ('cli' !== php_sapi_name()) {
    ExceptionHandler::register();
}

$app = require __DIR__.'/../app/app.php';
require __DIR__.'/../config/dev.php';
require __DIR__.'/../app/controllers.php';
$app->run();
