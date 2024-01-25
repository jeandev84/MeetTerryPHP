<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;

use Throwable;

/**
 * Handler
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception\Handler
 */
interface Handler
{
      /**
       * @param Throwable $e
       * @return mixed
      */
      public function handle(Throwable $e): mixed;
}