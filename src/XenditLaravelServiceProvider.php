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
        $this->app->alias('xendit-laravel', XenditService::class);
        $this->app->singleton('xendit-laravel', function () {
            return new XenditService;
        });

        $this->registerPublishing();

        $this->registerMiddleware();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            // Lumen lacks a config_path() helper, so we use base_path()
            $this->publishes([
                __DIR__.'/../config/xendit-laravel.php' => base_path('config/xendit-laravel.php'),
            ], 'laravel-xendit-config');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerMiddleware()
    {
        $this->app['router']->aliasMiddleware('xendit-server', EnsureXenditServer::class);
    }
}
