<?php
declare(strict_types=1);

namespace Framework\Contract\Psr3\Logger;


/**
 * LoggerAwareInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Contract\Psr3\Logger
*/
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     * @return void
    */
    public function setLogger(LoggerInterface $logger);
}