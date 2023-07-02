<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIndexController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->authorize('view-admin-panel', [self::class]);

        return view('admin.adminPanel');
    }

    public function addProduct()
    {
        $this->authorize('view-admin-panel', [self::class]);

        $categories = Category::query()->select('id','title')->get();

        return view('admin.addProduct', [
            'categories' => $categories
        ]);
    }

    public function showProducts()
    {
        $this->authorize('view-admin-panel', [self::class]);


        $products = Product::query()
            ->with('images:id,product_id,image_path', 'ratings:id,product_id,rating')
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();
        $pageCount = ceil($products->total() / $products->perPage());

        return view('admin.products', compact('products', 'pageCount'));
    }

    public function adminUsers()
    {
        $this->authorize('view-admin-panel', [self::class]);


        $user = User::query()->select('id', 'name','email')->with('roles:user_id,role_id')->withWhereHas('roles', function ($query) {
            $query->select('user_id','role_id')->where('role_id', '>', 1);
        })->get();

        return $user;
    }
}
