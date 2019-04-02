<?php

namespace gpibarra\LaravelAdminLTE;

use Illuminate\Support\ServiceProvider;
use AdminLTE;

class LaravelAdminLTEServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/gpibarra/LaravelAdminLTE'), 'LaravelAdminLTE');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'LaravelAdminLTE');

        // publish views
        $this->publishes([__DIR__.'/resources/views-layouts' => resource_path('views/layouts')], 'views-default');
        $this->publishes([__DIR__.'/resources/views-auth' => resource_path('views/auth')], 'views-default');
        $this->publishes([__DIR__.'/resources/views-errors' => resource_path('views/errors')], 'views-default');
        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/gpibarra/LaravelAdminLTE')], 'views');

        // publish lang files
        $this->publishes([__DIR__.'/resources/lang-errors' => resource_path('lang')], 'views-default');
        $this->publishes([__DIR__.'/resources/lang' => resource_path('lang/vendor/gpibarra')], 'lang');

        $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'gpibarra');

        // publish public assets
        $this->publishes([__DIR__.'/public' => public_path('vendor/gpibarra')], 'public');
        $this->publishes([__DIR__.'/public-gitignore/gpibarra-plugins' => public_path('vendor/gpibarra/plugins')], 'public');

        //CONFIG
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(__DIR__.'/config/laraveladminlte.php', 'LaravelAdminLTE');

        // publish config file
        $this->publishes([__DIR__.'/config' => config_path()], 'config');



        // calculate the path from current directory to get the vendor path
        $vendorPath = dirname(__DIR__, 3);

        // publish public AdminLTE assets
        $this->publishes([__DIR__.'/public-gitignore/adminlte' => public_path('vendor/adminlte')], 'public-adminlte');
        $this->publishes([$vendorPath.'/almasaeed2010/adminlte' => public_path('vendor/adminlte')], 'public-adminlte');



        //Routes
        $routeFilePath = '/routes/laraveladminlte.php';
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$routeFilePath;

        // but if there's a file with the same name in routes/backpack, use that one
        if (file_exists(base_path().$routeFilePath)) {
            $routeFilePathInUse = base_path().$routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);


        //Views
        view()->composer('*', function($view) {
            AdminLTE::setView($view);
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->commands([
//            gpibarra\LaravelAdminLTE\App\Console\Commands\MakeAuthCommand::class
//        ]);
    }
}
