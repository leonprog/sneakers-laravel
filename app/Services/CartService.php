<?php

namespace App\Services;

use App\Models\cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function store(array $data): RedirectResponse
    {
        $user = Auth::user();
        $cartProduct = $user->hasCartProduct($data['product_id']);

        if (!$cartProduct) {
            Cart::query()->create([
                'user_id' => Auth::id(),
                'product_id' => $data['product_id'],
                'quantity' => 1
            ]);
        } else {
            $quantity = ($user->carts->where('product_id', $data['product_id'])->firstOrFail()->quantity);
            $user->carts()->where('product_id', $data['product_id'])->update(['quantity' => $quantity + 1]);
        }

        return back();
    }

    public function delete()
    {

    }

    public function clear()
    {

    }
}
