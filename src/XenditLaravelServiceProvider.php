<?php

namespace Tanyudii\XenditLaravel;

use Carbon\Laravel\ServiceProvider;
use Tanyudii\XenditLaravel\Middlewares\EnsureXenditServer;
use Tanyudii\XenditLaravel\Services\XenditService;

class XenditLaravelServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/xendit-laravel.php", "xendit-laravel");

        $this->app->bind("xendit-service", function () {
            return new XenditService;
        });

        $this->app['router']->aliasMiddleware('xendit-server', EnsureXenditServer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . "/../assets/xendit-laravel.php" => config_path(
                        "xendit-laravel.php"
                    ),
                ],
                "xendit-laravel-config"
            );
        }
    }
}
