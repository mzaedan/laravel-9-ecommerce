<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Dashboard
Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
    });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('create_product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('store_product');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('show_product');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('delete_product');
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
});

//Product
Route::get('/product', [ProductController::class, 'index'])->name('index_product');

//Cart
Route::middleware(['auth'])->group(function () {

    Route::post('cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::get('/cart/edit/{id}', [CartController::class, 'edit'])->name('edit_cart');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    //Checkout
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    //Order
    Route::get('/order', [OrderController::class, 'index'])->name('index_order');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    Route::post('/order{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');

    //Profile
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});
