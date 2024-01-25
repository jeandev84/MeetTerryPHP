<?php
declare(strict_types=1);

namespace Framework\Foundation\Debug;

use Framework\Exception\Handler\ExceptionHandler;
use Framework\Exception\Handler\Whoops;
use Framework\Foundation\App;

/**
 * Capture
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation\Debug
 */
class Capture
{
    private function __construct()
    {
    }



    /**
     * @param App $app
     * @return void
    */
    public static function boot(App $app): void
    {
        $whoops = new Whoops();
        $whoops->pushHandler(new ExceptionHandler($app));
        $whoops->pushErrorHandler([new ExceptionHandler($app), 'convertWarningsAndNoticesToException']);
        $whoops->run();
    }
}