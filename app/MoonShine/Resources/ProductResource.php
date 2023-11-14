<?php

namespace App\MoonShine\Resources;

use App\Models\Brand;
use App\MoonShine\Fields\ImageCustom;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Enum;
use MoonShine\Fields\HasMany;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ProductResource extends Resource
{
	public static string $model = Product::class;

	public static string $title = 'Products';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Заголовок', 'title'),
            Number::make('Цена', 'price'),

            BelongsTo::make('Категории','category_id', 'title')->nullable(),
            BelongsTo::make('Бренд','brand_id', 'title')->nullable(),

//            HasMany::make('images')->fields([
//                Image::make('image_path'),
//            ])->hideOnIndex(),



        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
