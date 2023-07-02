<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartStoreRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function store(CartStoreRequest $request)
    {
        return $request->addCart();
    }

    public function delete(Cart $cart)
    {
        $this->authorize('cart-delete', [self::class, $cart]);

        $cart->delete();

        return back();
    }

    public function clearCart()
    {
        Auth::user()->carts()->detach();

        return back();
    }
}
