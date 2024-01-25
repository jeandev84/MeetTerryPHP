<?php
/** @var \Framework\Foundation\App $app */

declare(strict_types = 1);

use Framework\Foundation\App;

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

dump($app->isDebugMode());

dd($app);
