<?php
declare(strict_types=1);

namespace Framework\Foundation\Providers;

use Framework\Component\Config\Config;
use Framework\Component\Container\Container;
use Framework\Component\Container\ServiceProvider;

/**
 * ConfigServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation\Providers
 */
class ConfigServiceProvider extends ServiceProvider
{

    public function register(Container $app): void
    {
        $app->bind('config', function (Container $app) {
             $resources  = $app['filesystem']->resources('config/*');
             $config   = [];
             foreach ($resources as $name => $file) {
                $config[$name] = require $file;
             }
             return new Config($config);
        });
    }
}