<?php
declare(strict_types=1);

namespace Framework\Foundation;

use Exception;
use Framework\Component\Config\Config;
use Framework\Component\Container\Container;
use Framework\Component\Filesystem\Filesystem;
use Framework\Foundation\Providers\ConfigServiceProvider;
use Framework\Foundation\Providers\FilesystemServiceProvider;

/**
 * App
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation
*/
class App extends Container
{

     /**
      * @param string $basePath
     */
     public function __construct(string $basePath)
     {
         $this->registerBindings($basePath);
         $this->registerProviders();
     }




     /**
      * @return bool
     */
     public function isDebugMode(): bool
     {
        return $this['config']['app']['debug'] ?? false;
     }


     /**
      * @return string
     */
     public function getEnvironment(): string
     {
         return $this['config']['app']['env'] ?? 'production';
     }




     /**
      * @return string
      * @throws Exception
     */
     public function getLogPath(): string
     {
         if (!isset($this['config']['app']['log_path'])) {
             throw new Exception('Log path is not defined');
         }

         return $this['config']['app']['log_path'];
     }





     /**
      * @return bool
     */
     public function isRunningFromConsole(): bool
     {
         return (php_sapi_name() === 'cli' || php_sapi_name() === 'phpdbg');
     }






     /**
      * @param string $basePath
      * @return void
     */
     private function registerBindings(string $basePath): void
     {
         static::setInstance($this);
         $this->bind('basePath', $basePath);
     }






     /**
      * @return void
     */
     private function registerProviders(): void
     {
          $this->add(FilesystemServiceProvider::class)
               ->add(ConfigServiceProvider::class);
     }
}