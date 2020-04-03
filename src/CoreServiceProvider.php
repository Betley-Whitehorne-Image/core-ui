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

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
