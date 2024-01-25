<?php
declare(strict_types=1);

namespace Tests\Unit\Foundation;

use Framework\Foundation\App;
use PHPUnit\Framework\TestCase;

/**
 * AppTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Tests\Unit\Foundation
 */
class AppTest extends TestCase
{
    public function testItCanGetInstanceOfApplication(): void
    {
        self::assertInstanceOf(App::class, new App(__DIR__.'/../'));
    }



    public function testItCanGetBasicApplicationDatasetFromAppClass(): void
    {
          $app = new App(__DIR__.'/../../../');
          self::assertTrue($app->isRunningFromConsole());
          self::assertSame('test', $app->getEnvironment());
          self::assertNotNull($app->getLogPath());
          self::assertInstanceOf(\DateTime::class, $app->getServerTime());
    }
}
