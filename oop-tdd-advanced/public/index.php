<?php
declare(strict_types = 1);

use Framework\Component\Logger\LogLevel;
use Framework\Exception\Handler\ExceptionHandler;
use Framework\Foundation\App;

require_once __DIR__.'/../vendor/autoload.php';

$app = new App(realpath(__DIR__.'/../'));;

$logger = new \Framework\Component\Logger\Logger($app);
#$logger->log('no level', 'test no level');
$logger->log(LogLevel::EMERGENCY, 'There is an emergency', [
    'exception' => 'exception occurred'
]);

$logger->info( 'User account created successfully', [
    'id' => 5
]);