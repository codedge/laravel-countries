<?php

namespace Codedge\Countries;

use Illuminate\Support\ServiceProvider;
use Codedge\Countries\Commands\MigrationCommand;

class CountriesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application.
     *
     * @return void
     */
    public function boot()
    {
        // The publication files to publish
        $this->publishes([__DIR__.'/config/config.php' => $this->app->basePath().'/config/countries.php']);

        // Append the country settings
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'countries'
        );
    }

    /**
     * Register everything.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('Countries', Countries::class);

        $this->app->bind('countries', function () {
            return new Countries();
        });

        $this->app->singleton(
            'command.countries.migration',
            function ($app) {
                return new MigrationCommand($app);
            }
        );

        $this->commands(['command.countries.migration']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['countries', 'command.countries.migration'];
    }
}
