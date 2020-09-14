<?php

namespace Srmklive\Chargify\Providers;

/*
 * Class ChargifyServiceProvider
 * @package Srmklive\Chargify
 */

use Illuminate\Support\ServiceProvider;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;

class ChargifyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('chargify.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPayPal();

        $this->mergeConfig();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerPayPal()
    {
        $this->app->singleton('chargify', static function () {
            return new ChargifyClient();
        });
    }

    /**
     * Merges user's and paypal's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'chargify'
        );
    }
}
