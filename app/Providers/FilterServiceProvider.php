<?php

namespace App\Providers;

use App\Filters\App;
use App\Filters\Filter\CheckboxFilters;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(App::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        app(App::class)->registerFilters([
            CheckboxFilters::make('Категории', 'category', 'id',  Category::query()->withCount('products')->get()->toArray()),
            
            CheckboxFilters::make('Бренды', 'brand', 'id', Brand::query()->withCount('products')->get()->toArray()),
        ]);
    }
}
