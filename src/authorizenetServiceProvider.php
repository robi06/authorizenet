<?php

namespace robi06\authorizenet;

use Illuminate\Support\ServiceProvider;

class authorizenetServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/authorizenet.php' => config_path('authorizenet.php'),
        ]);
    }

    public function register()
    {
        $this->registerAuthNet();
    }
    private function registerAuthNet()
    {
        $this->app->bind('authnet',function($app){
            return new AuthNet($app);
        });
    }
}
