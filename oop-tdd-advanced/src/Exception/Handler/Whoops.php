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
 *
 * //TODO refactoring
*/
class Whoops
{

    /**
     * @var ExceptionHandlerInterface[]
    */
    protected array $handlers = [];



    /**
     * @var array
    */
    protected array $errorHandlers = [];


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
     * @param callable $handler
     * @return $this
    */
    public function pushErrorHandler(callable $handler): static
    {
        $this->errorHandlers[] = $handler;

        return $this;
    }




    /**
     * @return void
    */
    public function run(): void
    {
        foreach ($this->errorHandlers as $handler) {
            set_error_handler($handler);
        }

        foreach ($this->handlers as $handler) {
            set_exception_handler([$handler, 'handle']);
        }
    }
}