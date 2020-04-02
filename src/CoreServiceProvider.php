<?php

namespace Riclep\Core;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    	UiCommand::macro('core', function($command) {
    		Core::install();
			$command->info('Core files installed');
		});

        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'core');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'core');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('core.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/core'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/core'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/core'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
      /*  // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'core');

        // Register the main class to use with the facade
        $this->app->singleton('core', function () {
            return new Core;
        });*/
    }
}
