<?php
declare(strict_types = 1);

use Framework\Foundation\App;

require_once __DIR__.'/../vendor/autoload.php';

$app = new App(realpath(__DIR__.'/../'));;

echo $app->getInfo();

dd($app);
