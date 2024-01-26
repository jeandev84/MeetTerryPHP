<?php
declare(strict_types=1);

namespace Framework\Component\Database;

use Framework\Exception\DatabaseConnectionException;
use PDO;
use PDOException;

/**
 * PDOConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Database
 */
class PDOConnection extends AbstractConnection  implements DatabaseConnectionInterface
{


    public const REQUIRED_CONNECTION_KEYS =  [
        'driver',
        'host',
        'db_name',
        'db_username',
        'db_user_password',
        'default_fetch'
    ];

    /**
     * @inheritdoc
    */
    public function connect(): static
    {
        $credentials = $this->parseCredentials($this->credentials);

        try {
            $this->connection = new PDO(...$credentials);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
                $this->credentials['default_fetch']
            );
        } catch (PDOException $e) {
            throw new DatabaseConnectionException($e->getMessage(), $this->credentials, 500);
        }
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function getConnection(): PDO
    {
        return $this->connection;
    }




    /**
     * @inheritDoc
    */
    protected function parseCredentials(array $credentials): array
    {
        // dsn: data source name
        $dsn  = sprintf(
            '%s:host=%s;dbname=%s',
            $credentials['driver'],
            $credentials['host'],
            $credentials['db_name']
        );

        return [$dsn, $credentials['db_username'], $credentials['db_user_password']];
    }
}