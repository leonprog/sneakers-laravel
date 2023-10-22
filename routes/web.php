<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductManagerController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Кэш очищен. ";
});


Route::controller(AuthController::class)->group(function () {
    Route::post('/registration', 'registration')->name('registration_action');
    Route::post('/login', 'login')->name('login_action');
    Route::get('/logout', 'logout')->name('logout');;

    //OAuth2
    Route::get('/login/{provider}', 'redirect')->name('login.social');
    Route::get('/login/{provider}/callback', 'handleCallback');
});

// View pages
Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/registration', 'registration')->name('registration');
    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/catalog/{product}', 'product')->name('product');
    Route::get('/blog', 'blog')->name('blog');
});
// Admin panel
Route::prefix('/admin-panel')->middleware(['auth', AdminMiddleware::class])->controller(AdminIndexController::class)->group(function () {
    Route::get('/', 'index')->name('adminPanel');
    Route::get('/add-product', 'addProduct')->name('addProduct');
    Route::get('/products', 'showProducts')->name('adminProducts');
    Route::get('/admin-users', 'adminUsers')->name('adminPanel.adminUsers');

    Route::get('/setting/{product}', 'setting')->name('setting');

    // action Product
    Route::controller(ProductManagerController::class)->group(function () {
        Route::post('/add-product', 'store')->name('addProduct_action');
        Route::post('/setting/{product}', 'setting')->name('productSetting_action');
        Route::post('/deleted', 'selectDelete')->name('selectedProductDelete_action');

        Route::post('/update/{product}', 'update')->name('admin.update');
    });
});
// Cart
Route::prefix('/cart')->middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'cart'])->name('cart');

    Route::controller(CartController::class)->group(function () {
        Route::post('/add', 'store')->name('cart.add');
        Route::delete('/remove/{cart}', 'delete')->name('cart.delete');
        Route::delete('/clear', 'clearCart')->name('cart.clear');
    });
});

Route::post('/set-currency', [CurrencyController::class, 'setCurrency'])->name('set-currency');

