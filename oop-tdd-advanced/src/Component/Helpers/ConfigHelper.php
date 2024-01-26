<?php
declare(strict_types=1);

namespace Framework\Component\Helpers;

use Framework\Exception\NotFoundException;
use Throwable;

define('CONFIG_PATH', dirname(dirname(dirname(__DIR__))) . '/config');

/**
 * ConfigHelper
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Helpers
 */
class ConfigHelper
{

      /**
       * @param string $filename
       * @param string|null $key
       * @return array
      */
      public static function get(string $filename, string $key = null): array
      {
           $fileContent = self::getFileContent($filename);
           if ($key === null) {
               return $fileContent;
           }
           return $fileContent[$key] ?? [];
      }


      /**
       * @param string $filename
       * @return array
       * @throws NotFoundException
      */
      public static function getFileContent(string $filename): array
      {
          $fileContent = [];

          try {

              $path = realpath(sprintf(CONFIG_PATH.'/%s.php', $filename));

              if (file_exists($path)) {
                  $fileContent = require $path;
              }

          } catch (Throwable $e) {
              throw new NotFoundException(
                  sprintf('The specified file: %s was not found', $filename),
                  ['not found file', 'data is passed']
              );
          }

          return $fileContent;
      }
}