<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;

use Framework\Foundation\App;
use Throwable;

/**
 * ExceptionHandler
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception\Handler
 */
class ExceptionHandler
{

      /**
       * @param App $app
      */
      public function __construct(
          protected App $app
      )
      {
      }



      /**
       * @param Throwable $e
       * @return void
      */
      public function handle(Throwable $e): void
      {
          if ($this->app->isDebugMode()) {
              dump($e);
          }
      }
}