<?php
declare(strict_types=1);

namespace Framework\Component\Database;

use PDO;

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
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function getConnection(): mixed
    {
        // TODO: Implement getConnection() method.
    }
}