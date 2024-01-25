<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;


use Exception;
use Throwable;

/**
 * ExceptionHandlerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception\Handler
 */
interface ExceptionHandlerInterface extends Handler
{
    public function getException(): Exception;
}