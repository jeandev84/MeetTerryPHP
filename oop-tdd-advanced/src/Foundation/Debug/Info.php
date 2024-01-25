<?php
declare(strict_types=1);

namespace Framework\Foundation\Debug;

use Framework\Foundation\App;

/**
 * Info
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation\Debug
 */
class Info
{
     private array $html = [];

     public function __construct(protected App $app)
     {

     }


     public function __toString(): string
     {
         $this->html[] = 'Server time: '. $this->app->getServerTime()->format('Y-m-d H:i:s');
         $this->html[] = 'Log path: '. $this->app->getLogPath();
         $this->html[] = 'Environment: '. $this->app->getEnvironment();
         $this->html[] = 'DebugMode: '. ($this->app->isDebugMode() ? 'true': 'false');
         $this->html[] = 'Running from : '. ($this->app->isRunningFromConsole() ? 'console' : 'browser');

         return join("<hr>", $this->html);
     }
}