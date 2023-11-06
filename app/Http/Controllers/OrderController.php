<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $carts = Auth::user()->carts;

        foreach ($carts as $item) {
            $productId = $item->pivot->product_id;
            $productImage = ProductImage::query()
                ->select('image_path')
                ->where('product_id', $productId)
                ->first();

            $item['image_path'] = $productImage['image_path'];
        }


        return view('orders', compact('carts'));
    }

    public function store(OrderRequest $request)
    {
        $validated = $request->validated();

        $order = Order::create([
            'user_id' => auth()->id()
        ]);
        $carts = Auth::user()->carts;


        foreach ($carts as $cart) {
            OrderProduct::create([
               'product_id' => $cart->pivot_product_id,
               'order_id' => $order->id,
            ]);

            $cart->delete();
        }



        return back();

    }

    public function list()
    {
        $orders = Auth::user()->orders;

        return view('order-list', compact('orders'));
    }
}

