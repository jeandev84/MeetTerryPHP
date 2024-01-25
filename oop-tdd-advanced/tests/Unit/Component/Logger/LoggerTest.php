<?php
declare(strict_types=1);

namespace Tests\Unit\Component\Logger;

use Framework\Component\Logger\Logger;
use Framework\Component\Logger\LogLevel;
use Framework\Contract\Psr3\Logger\LoggerInterface;
use Framework\Exception\InvalidLogLevelArgument;
use Framework\Foundation\App;
use PHPUnit\Framework\TestCase;

/**
 * LoggerTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Tests\Unit\Component\Logger
 */
class LoggerTest extends TestCase
{

     private Logger $logger;


     private App $app;

     protected function setUp(): void
     {
         $this->app = new App(__DIR__.'/../../../../');
         $this->logger = new Logger($this->app);
     }

    public function testItImplementsTheLoggerInterface(): void
     {
         self::assertInstanceOf(LoggerInterface::class, $this->logger);
     }


     public function testItCanCreateDifferentTypesOfLogLevel(): void
     {
          $this->logger->info('Testing Info logs');
          $this->logger->error('Testing Error logs');
          $this->logger->log(LogLevel::ALERT, 'Testing Alert logs');


          $fileName = sprintf("%s/%s-%s.log", $this->app->getLogPath(), 'test', date("j.n.Y"));
          self::assertFileExists($fileName);

          $contentOfLogFile = file_get_contents($fileName);
          self::assertStringContainsString('Testing Info logs', $contentOfLogFile);
          self::assertStringContainsString('Testing Error logs', $contentOfLogFile);
          self::assertStringContainsString(LogLevel::ALERT, $contentOfLogFile);
          unlink($fileName);
          self::assertFileDoesNotExist($fileName);
     }




     public function testItThrowsInvalidLogLevelArgumentExceptionWhenGivenAWrongLogLevel(): void
     {
           self::expectException(InvalidLogLevelArgument::class);
           $this->logger->log('invalid_log_level', 'Testing Invalid log level');
     }
}
