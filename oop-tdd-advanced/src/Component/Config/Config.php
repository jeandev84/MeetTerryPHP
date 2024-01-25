<?php
declare(strict_types=1);

namespace Framework\Component\Config;

/**
 * Config
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Config
*/
class Config implements \ArrayAccess
{
    /**
     * @param array $config
    */
    public function __construct(protected array $config)
    {
    }


    /**
     * @param $id
     * @param null $default
     * @return mixed
    */
    public function get($id, $default = null): mixed
    {
        return $this->config[$id] ?? $default;
    }



    /**
     * @param string $name
     * @param $value
     * @return void
    */
    public function __set(string $name, $value): void
    {
        $this->config[$name] = $value;
    }


    /**
     * @param string $name
     * @return mixed
    */
    public function __get(string $name)
    {
        return $this->get($name);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->config[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->get($offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->config[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->config[$offset]);
    }
}