<?php
declare(strict_types=1);

namespace Framework\Component\Container;


/**
 * ContainerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Container
 */
interface ContainerInterface
{

    /**
     * @param $id
     * @return bool
     */
     public function has($id): bool;



     /**
      *
      * @param $id
      * @return mixed
     */
     public function get($id): mixed;
}