<?php

namespace MieProject\ProjectInitialization;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
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

        (new playWithFiles)->run();

        $this->publishResources();
        
        $this->publishes([
            __DIR__.'/config/mie.php' => config_path('mie.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/config/mie.php' , 'mie'
        );

    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/database/seeders/PermissionsDemoSeeder.php' => database_path('seeders/PermissionsDemoSeeder.php'),
        ]);
    }






}
