<?php
declare(strict_types=1);

namespace Framework\Component\Container;

use RuntimeException;

/**
 * Container
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Container
*/
class Container implements ContainerInterface, \ArrayAccess
{

     /**
      * @var
     */
     protected static $instance;



     /**
      * @var array
     */
     protected array $bindings = [];




     /**
      * @var array
     */
     protected array $providers = [];



     /**
      * @return static
     */
     public static function getInstance(): static
     {
         if (!static::$instance) {
             static::$instance = new static();
         }

         return static::$instance;
     }


    /**
     * @param ContainerInterface $instance
     * @return ContainerInterface
     */
     public static function setInstance(ContainerInterface $instance): ContainerInterface
     {
         return self::$instance = $instance;
     }




     /**
      * @param $id
      * @param callable $value
      * @return $this
     */
     public function bind($id, mixed $value): static {
         $this->bindings[$id] = $value;
         return $this;
     }




     /**
      * @param string $provider
      *
      * @return $this
     */
     public function add(string $provider): static
     {
          return $this->addProvider(new $provider($this));
     }




     /**
      * @param ServiceProvider $provider
      * @return $this
     */
     public function addProvider(ServiceProvider $provider): static
     {
          $classname = get_class($provider);
          if (!isset($this->providers[$classname])) {
             $provider->register($this);
             $this->providers[$classname] = $provider;
          }

          return $this;
     }


     /**
      * @inheritdoc
     */
     public function has($id): bool
     {
         return isset($this->bindings[$id]);
     }


     /**
      * @param $id
      * @return void
     */
     public function remove($id): void
     {
         unset($this->bindings[$id]);
     }


     /**
      * @inheritdoc
     */
     public function get($id): mixed
     {
         if (!$this->has($id)) {
             throw new RuntimeException("Could not resolve service#$id");
         }

         $value = $this->bindings[$id];

         if (is_callable($value)) {
             return $value($this);
         }

         return $value;
     }


     public function resolve($id) {}

     public function offsetExists(mixed $offset): bool
     {
         return $this->has($offset);
     }

     public function offsetGet(mixed $offset): mixed
     {
        return $this->get($offset);
     }

     public function offsetSet(mixed $offset, mixed $value): void
     {
        $this->bind($offset, $value);
     }

     public function offsetUnset(mixed $offset): void
     {
        $this->remove($offset);
     }


     /**
      * @param string $name
      * @param $value
      * @return void
     */
     public function __set(string $name, $value): void
     {
         $this->bind($name, $value);
     }


     /**
      * @param string $name
      * @return mixed
     */
     public function __get(string $name)
     {
         return $this->get($name);
     }
}