<?php
declare(strict_types = 1);

use Framework\Foundation\App;

require_once __DIR__.'/../vendor/autoload.php';

$app = new App(realpath(__DIR__.'/../'));;

dump($app->getServerTime()->format('Y-m-d H:i:s'));
dump($app->getLogPath());
dump($app->getEnvironment());
dump($app->isDebugMode());
dump($app->isRunningFromConsole());

dd($app);
