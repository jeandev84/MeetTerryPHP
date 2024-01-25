<?php
declare(strict_types = 1);

use Framework\Exception\Handler\ExceptionHandler;
use Framework\Foundation\App;

require_once __DIR__.'/../vendor/autoload.php';

/* set_exception_handler([new ExceptionHandler(), 'handle']); */
$app = new App(realpath(__DIR__.'/../'));;

echo $app->getInfo();

dd($app);
