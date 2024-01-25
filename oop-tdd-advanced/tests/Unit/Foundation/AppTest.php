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
}
