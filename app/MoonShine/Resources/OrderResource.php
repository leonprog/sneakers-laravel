<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\HasMany;
use MoonShine\Fields\HasOne;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class OrderResource extends Resource
{
	public static string $model = Order::class;

	public static string $title = 'Orders';

	public function fields(): array
	{
		return [
		    ID::make('Номер заказа', 'id'),
		    Select::make('Статус', 'status')->options([
                'Сбор заказа' => 'Сбор заказа',
                'Едет' => 'Едет',
                'Ждет получения' => 'Ждет получения',
            ])->hideOnIndex(),

            Text::make('Город', 'city'),
            Text::make('Адрес', 'address'),
            Text::make('Индекс', 'index'),
            Text::make('Телефон', 'phone'),

            HasMany::make('Продукты', 'products')->fields([
                ID::make(),
                BelongsTo::make('Товар', 'product', 'title')->readonly()
            ])->removable()->hideOnIndex()


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
