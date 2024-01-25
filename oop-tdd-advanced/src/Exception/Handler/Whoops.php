<?php
declare(strict_types=1);

namespace Framework\Exception\Handler;

/**
 * Whoops
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception\Handler
*/
class Whoops
{

    /**
     * @var ExceptionHandlerInterface[]
    */
    protected array $handlers = [];


    /**
     * @param Handler $handler
     *
     * @return $this
    */
    public function pushHandler(Handler $handler): static
    {
       $this->handlers[] = $handler;

       return $this;
    }




    /**
     * @return void
    */
    public function run(): void
    {
        foreach ($this->handlers as $handler) {
            if ($handler instanceof ExceptionHandlerInterface) {
                set_exception_handler([$handler, 'handle']);
            } elseif ($handler instanceof ErrorHandlerInterface) {
                set_error_handler([$handler, 'handle']);
            } else {
                set_exception_handler([$handler, 'handler']);
            }
        }
    }
}