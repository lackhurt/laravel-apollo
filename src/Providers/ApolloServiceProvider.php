<?php

namespace Lackhurt\Apollo\Providers;

use Illuminate\Support\ServiceProvider;
use Lackhurt\Apollo\ConfigReader;
use Lackhurt\Apollo\Console\Commands\StartApolloAgent;

class ApolloServiceProvider extends ServiceProvider
{

    /**
     * 是否延时加载提供器。
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration files
        $this->publishes([
            __DIR__ . '/../../config/apollo.php' => config_path('apollo.php'),
            __DIR__ . '/../../storage/apollo' => storage_path() . '/apollo'
        ], 'apollo');


        if ($this->app->runningInConsole()) {
            $this->commands([
                StartApolloAgent::class
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/apollo.php', 'apollo'
        );

        $this->app->singleton('apollo', function ($app) {
            return new ConfigReader($app['config']->get('apollo.save_dir'));
        });

        $this->app->singleton(
            'command.apollo.start-agent',
            function ($app)  {
                return new StartApolloAgent();
            }
        );

        $this->commands(
            'command.apollo.start-agent'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['apollo', 'command.apollo.start-agent'];
    }
}