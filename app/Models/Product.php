<?php

namespace App\Models;

use App\Filters\App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'price',
        'quantity',
        'category_id',
        'brand_id'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }

    public function scopeFiltered(Builder $query, $request)
    {
        foreach (app(App::class)->filters() as $filter) {
            $query = $filter->apply($query, $request);
        }

        return $query;
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function userCart()
    {
        return $this->cart()->hasOne(User::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function convertPrice()
    {
        $symbol = 'RUB';
        $price = $this->price;

        if (session('currency')) {
            $currency = __('currency.' . session('currency') . '.rate');

            $price = bcdiv($this->price / $currency, 1, 2);
            $symbol = __('currency.' . session('currency') . '.symbol');
        }

        return [
            'price' => $price,
            'symbol' => $symbol,
        ];

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
}
