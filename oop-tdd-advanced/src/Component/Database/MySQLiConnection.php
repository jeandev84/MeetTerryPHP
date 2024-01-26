<?php
declare(strict_types=1);

namespace Framework\Component\Database;

use Framework\Exception\DatabaseConnectionException;
use mysqli_driver;
use mysqli;
use Throwable;

/**
 * MySQLiConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Database
*/
class MySQLiConnection extends AbstractConnection implements DatabaseConnectionInterface
{

    public const REQUIRED_CONNECTION_KEYS = [
        'host',
        'db_name',
        'db_username',
        'db_user_password',
        'default_fetch'
    ];


    /**
     * @inheritDoc
    */
    protected function parseCredentials(array $credentials): array
    {
        return [
            $credentials['host'],
            $credentials['db_name'],
            $credentials['db_username'],
            $credentials['db_user_password']
        ];
    }



    /**
     * @inheritDoc
    */
    public function connect(): static
    {
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
        $credentials = $this->parseCredentials($this->credentials);

        try {
             $this->connection = new mysqli(...$credentials);
        } catch (Throwable $e) {
            throw new DatabaseConnectionException(
                $e->getMessage(),
                $this->credentials,
                500
            );
        }
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function getConnection(): mysqli
    {
       return $this->connection;
    }
}