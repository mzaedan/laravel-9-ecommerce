<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
    });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Product
Route::get('/product/create', [ProductController::class, 'create'])->name('create_product');
Route::post('/product/store', [ProductController::class, 'store'])->name('store_product');
Route::get('/product', [ProductController::class, 'index'])->name('index_product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show_product');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('edit_product');
Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('delete_product');



