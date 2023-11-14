<?php

namespace App\Providers;

use App\MoonShine\Resources\BrandResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\OrderResource;
use App\MoonShine\Resources\ProductResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
//            MenuGroup::make('moonshine::ui.resource.system', [
////                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
////                    ->translatable()
////                    ->icon('users'),
////                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
////                    ->translatable()
////                    ->icon('bookmark'),
////            ])->translatable(),

            MenuItem::make('Категории', new CategoryResource())->translatable()->icon('heroicons.table-cells'),
            MenuItem::make('Бренды', new BrandResource())->translatable()->icon('heroicons.table-cells'),
            MenuItem::make('Продукты', new ProductResource())->translatable()->icon('heroicons.table-cells'),

            MenuItem::make('Заказы', new OrderResource())->translatable()->icon('heroicons.table-cells')
        ]);
    }
}
