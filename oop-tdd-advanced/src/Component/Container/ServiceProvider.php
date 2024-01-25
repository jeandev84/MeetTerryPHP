<?php
declare(strict_types=1);

namespace Framework\Component\Container;


/**
 * ServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Container
 */
abstract class ServiceProvider
{
       /**
        * @param Container $app
        * @return void
       */
       abstract public function register(Container $app): void;
}