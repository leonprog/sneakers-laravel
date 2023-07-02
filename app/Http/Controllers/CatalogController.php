<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{


    public function product()
    {
        return view('productPage', []);
    }
}
