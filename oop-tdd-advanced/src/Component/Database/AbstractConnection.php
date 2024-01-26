<?php
declare(strict_types=1);

namespace Framework\Component\Database;

use Framework\Exception\MissingArgumentException;

/**
 * AbstractConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Database
*/
abstract class AbstractConnection
{
      protected $connection;
      protected $credentials;


      const REQUIRED_CONNECTION_KEYS = [];


      /**
       * @param array $credentials
      */
      public function __construct(array $credentials)
      {
          if (!$this->credentialsHaveRequiredKeys($credentials)) {
               throw new MissingArgumentException(
                  sprintf(
                      "Database connection credentials are not mapped correctly, required key: %s",
                      implode(', ', self::REQUIRED_CONNECTION_KEYS)
                  )
               );
          }

          $this->credentials = $credentials;
      }


      /**
       * @param array $credentials
       * @return bool
      */
      private function credentialsHaveRequiredKeys(array $credentials): bool
      {
           $matches = array_intersect_key(static::REQUIRED_CONNECTION_KEYS, array_keys($credentials));

           return count($matches) === count(static::REQUIRED_CONNECTION_KEYS);
      }


      /**
       * @param array $credentials
       * @return array
      */
      abstract protected function parseCredentials(array $credentials): array;
}