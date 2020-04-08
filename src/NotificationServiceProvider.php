<?php

namespace Yegobox\Notification;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerRoutes();
        $this->registerAuthGuard();
        $this->registerPublishing();
        //NOTE: for the purpose that we need to have subdomain works on top level domain
        //routes of the service need to registered in RouteServiceProvider of yegobox so they are loaded first.
        //we have ommited registering the route inside the service itself please see yegobox RouteServiceProvider
        //for details of how route of services are registered
        //and please uncomment the bellow line only when you are developing locally and or when you don't have
        //yegobox on your local machine.
        // $this->mapDomainWebRoutes();
                
        $this->loadViewsFrom(
            __DIR__ . '/resources/views',
            'notification'
        );
    }

 

    /**
     * Register the package's authentication guard.
     *
     * @return void
     */
    private function registerAuthGuard()
    { }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/github'),
            ], 'github-assets');

            $this->publishes([
                __DIR__ . '/../config/github.php' => config_path('github.php'),
            ], 'github-config');
        }
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
  
    }
}
