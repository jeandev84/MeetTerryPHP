<?php
declare(strict_types=1);

namespace Tests\Unit\Component\Database;

use Framework\Component\Database\PDOConnection;
use Framework\Exception\MissingArgumentException;
use PDO;
use PHPUnit\Framework\TestCase;

/**
 * DatabaseConnectionTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Tests\Unit\Component\Database
 */
class DatabaseConnectionTest extends TestCase
{
     public function testItThrowMissingArgumentExceptionWithWrongCredentialKeys(): void
     {

        #self::expectException(MissingArgumentException::class);
        $credentials = [];
        $pdoHandler  = (new PDOConnection($credentials))->connect();
     }



    public function testItCanConnectToDatabaseWithPdoApi(): void
    {
        $credentials = [];

        $pdoHandler = (new PDOConnection($credentials))->connect();

        self::assertNotNull($pdoHandler);
    }
}