<?php
declare(strict_types=1);

namespace Tests\Unit\Component\Database;

use Framework\Component\Database\DatabaseConnectionInterface;
use Framework\Component\Database\PDOConnection;
use Framework\Component\Helpers\ConfigHelper;
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
        self::expectException(MissingArgumentException::class);
        $credentials = [];
        $pdoHandler  = (new PDOConnection($credentials))->connect();
     }



    public function testItCanConnectToDatabaseWithPdoApi()
    {
        $credentials = $this->getCredentials('pdo');

        $pdoHandler = (new PDOConnection($credentials))->connect();

        #self::assertNotNull($pdoHandler);
        self::assertInstanceOf(DatabaseConnectionInterface::class, $pdoHandler);
        return $pdoHandler;
    }


    /** @depends testItCanConnectToDatabaseWithPdoApi */
    public function testItIsAValidPdoConnection(DatabaseConnectionInterface $handler)
    {
          self::assertInstanceOf(PDO::class, $handler->getConnection());
    }



    private function getCredentials(string $type): array
    {
        return array_merge(
            ConfigHelper::get('database', $type),
            ['db_name' => 'bug_report_app_testing'] // database for test
        );
    }
}