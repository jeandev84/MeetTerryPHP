<?php
declare(strict_types=1);

namespace Framework\Component\Database;


/**
 * DatabaseConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Database
 */
interface DatabaseConnectionInterface
{

      /**
       * @return mixed
      */
      public function connect(): mixed;


      /**
       * @return mixed
      */
      public function getConnection(): mixed;
}