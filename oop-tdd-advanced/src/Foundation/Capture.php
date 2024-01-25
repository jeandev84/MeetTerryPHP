<?php
declare(strict_types=1);

namespace Framework\Foundation;

use Framework\Exception\Handler\ExceptionHandler;

/**
 * Capture
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation
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
        $whoops = new \Framework\Exception\Handler\Whoops();
        $whoops->pushHandler(new ExceptionHandler($app));
        $whoops->run();
    }
}