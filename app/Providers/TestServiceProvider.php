<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Event;
use App\Events\NewOrderEvent;
use App\Listeners\OrderEmailListener;
use App\Listeners\OrderSaveListener;

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
        Event::listen(
            NewOrderEvent::class,
            OrderEmailListener::class
        );
        Event::listen(
            NewOrderEvent::class,
            OrderSaveListener::class
        );
    }
}
