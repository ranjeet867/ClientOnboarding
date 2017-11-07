<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Handler\LogEntriesHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Logentries Integration
        $logEntriesHandler = new LogEntriesHandler(env('LOGENTRIES_TOKEN'));
        $log = $this->app['log']->getMonolog();
        $log->pushHandler($logEntriesHandler);
    }
}
