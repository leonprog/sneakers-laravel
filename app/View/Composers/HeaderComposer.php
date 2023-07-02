<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        if (Auth::user()) {
            $cart = Auth::user()->carts;
            $totalPrice = 0;
            $symbol = 'RUB';

            foreach ($cart as $item) {
                $totalPrice += $item->price * $item->pivot->quantity;
            }

            if (session('currency') ) {
                $totalPrice = bcdiv(($totalPrice / __('currency.'. session('currency') .'.rate')), 1, 2);
                $symbol =  __('currency.'. session('currency') .'.symbol');
            }

            $currencyPrice = [
                'totalPrice' => $totalPrice,
                'symbol' => $symbol,
            ];

            $view->with('currencyPrice', $currencyPrice);
        }

    }
}
