<?php

namespace MieProject\ProjectInitialization;

use Illuminate\Support\ServiceProvider;

class ProjectInitializationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // for this package
        require_once __DIR__ . '/helpers.php';


        //

//        $this->mergeConfigFrom(
//            __DIR__.'/config/setting_fields.php' , 'setting_fields'
//        );
//
//        $this->loadViewsFrom(__DIR__.'/views', 'mie-setting');
//
//        $this->loadRoutesFrom(__DIR__."/routes/web.php");
//        $this->loadMigrationsFrom(__DIR__.'/migrations');

    }
}
