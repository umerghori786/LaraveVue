<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentService;
use Illuminate\Pagination\Paginator;
use App\Observers\ProductObserver;
use App\Models\Product;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('PaymentServiceContainer',function(){

            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Product::observe(ProductObserver::class);


    }
}
