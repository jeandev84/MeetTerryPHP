<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;

use ErrorException;
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
 *
 * @see https://www.php.net/manual/en/function.error-reporting.php
 */
class ExceptionHandler implements Handler
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
              echo 'from : ' . __METHOD__;
          } else {
              echo "This should not have happened, please try again";
          }
          return true;
      }


      /**
       * @param $severity
       * @param $message
       * @param $file
       * @param $line
       * @return void
       * @throws ErrorException
      */
      public function convertWarningsAndNoticesToException(
          $severity,
          $message,
          $file,
          $line
      ): void
      {
          throw new ErrorException($message, $severity, $severity, $file, $line);
      }
}