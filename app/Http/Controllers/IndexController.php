<?php

namespace App\Http\Controllers;

use App\Filters\App;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function catalog(Request $request)
    {
        $products = Product::query()
        ->filtered($request)
        ->select(['id', 'title', 'price'])
        ->whereHas('images')
        ->with(['images' => function ($query) {
            $query->select('id', 'product_id', 'image_path');
        }])
        ->with('ratings:id,product_id,rating')
        ->orderByDesc('created_at')
        ->paginate(12)
        ->withQueryString();

        return view('shop', [
            'products' => $products,
            'filters' => app(App::class)->filters(),
        ]);
    }

    public function product(Product $product)
    {
        $product = $product->with('images:id,product_id,image_path')->find($product->id);

        return view('productPage', [
            'product' => $product
        ]);
    }

    public function blog()
    {
        return view('blog');
    }

    public function cart()
    {
        $carts = $this->userCart();

        foreach ($carts as $item) {
            $productId = $item->pivot->product_id;
            $productImage = ProductImage::query()
                ->select('image_path')
                ->where('product_id', $productId)
                ->first();

            $item['image_path'] = $productImage['image_path'];
        }

        return view('cart', [
            'products' => $carts,
        ]);
    }


    private function userCart()
    {
        return Auth::user()->carts;
    }
}
