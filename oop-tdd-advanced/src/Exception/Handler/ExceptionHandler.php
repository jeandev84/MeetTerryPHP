<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;

use Exception;
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
class ExceptionHandler implements ExceptionHandlerInterface
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
       * @inheritdoc
      */
      public function handle(Throwable $e): bool
      {
          if ($this->app->isDebugMode()) {
              dump($e);
          } else {
              echo "This should not have happened, please try again";
          }
          return true;
      }

      public function getException(): Exception
      {
           return '';
      }
}