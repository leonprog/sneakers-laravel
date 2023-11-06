<?php

namespace App\Providers;

use App\View\Composers\HeaderComposer;
use App\View\Composers\ProductComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['components.header','cart', 'components.product.product', 'orders'], HeaderComposer::class);
    }
}
