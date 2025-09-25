<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentService;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('PaymentServiceContainerTest',function(){

            return new PaymentService;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
