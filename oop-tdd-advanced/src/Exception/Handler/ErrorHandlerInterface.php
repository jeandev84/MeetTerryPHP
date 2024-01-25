<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;


use Error;
use Throwable;

/**
 * ErrorHandlerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception\Handler
*/
interface ErrorHandlerInterface extends Handler
{
     public function getError(): \ErrorException;
}