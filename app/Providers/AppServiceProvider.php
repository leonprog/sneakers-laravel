<?php

namespace App\Providers;


use App\Facades\CartFacade;
use App\Services\AuthService;
use App\Services\CartService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->facades();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    private function facades()
    {
        $this->app->bind('auth.facade', AuthService::class);
        $this->app->bind('cart.facade', CartService::class);
    }
}
