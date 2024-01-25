<?php
declare(strict_types=1);

namespace Framework\Component\Filesystem;

/**
 * Filesystem
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Filesystem
 */
class Filesystem
{

    /**
     * @var string
    */
    protected string $basePath;


    /**
     * @param string $basePath
    */
    public function __construct(string $basePath)
    {
        $this->basePath = rtrim($basePath, DIRECTORY_SEPARATOR);
    }


    /**
     * @param string $path
     * @return string
    */
    public function locate(string $path): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . trim($path, DIRECTORY_SEPARATOR);
    }


    /**
     * @param string $pattern
     * @return array
    */
    public function resources(string $pattern): array
    {
         $files     = glob($this->locate($pattern));
         $resources = [];
         foreach ($files as $file) {
             $info = pathinfo($file);
             $resources[$info['filename']] = $file;
         }
         return $resources;
    }
}