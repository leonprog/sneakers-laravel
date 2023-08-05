<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductManagerController extends Controller
{
    public function store(AddProductRequest $request)
    {
        $product = Product::query()->create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'image_path' => $image->store('public/product_cover'),
                ]);
            }
        }

        return back();

    }

    public function setting(Product $product, Request $request)
    {
        if ($request->input('action') === 'delete') {
           $product->delete();
        }

        if ($request->input('action') === 'publish') {
            return 'publish';
        }

        return back();
    }

    public function selectDelete(Request $request)
    {
        if ($request->product_id) {
            Product::where('id', $request->product_id)->delete();
        } else {
            Product::query()->whereIn('id', $request->selected_products)->delete();
        }

        return back();
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);

        return back();
    }
}
