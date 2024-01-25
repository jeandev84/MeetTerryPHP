<?php
declare(strict_types=1);

namespace Framework\Foundation\Providers;

use Framework\Component\Container\Container;
use Framework\Component\Container\ServiceProvider;
use Framework\Component\Filesystem\Filesystem;
use Framework\Foundation\App;

/**
 * FilesystemServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Foundation\Providers
 */
class FilesystemServiceProvider extends ServiceProvider
{

    public function register(Container $app): void
    {
        $app->bind('filesystem', function (Container $app) {
            return new Filesystem($app['basePath']);
        });
    }
}