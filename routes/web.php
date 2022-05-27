<?php

use App\Http\Controllers\DashboardController\CategoryController;
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\DashboardController\OrderController;
use App\Http\Controllers\DashboardController\ProductController;
use App\Http\Controllers\FrontCotroller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontCotroller::class,'index'])->name('index');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::prefix('/dashboard/category')->middleware(['auth'])->group(function ()
    {
        Route::get('/',[CategoryController::class,'manage_category'])->name('category.manage');
        Route::get('/add_category',[CategoryController::class,'add'])->name('category.add');
        Route::post('/stor_category}',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit_category/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update_category/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/destroy_category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
    }
);



Route::prefix('/dashboard/product')->middleware(['auth'])->group(function ()
    {
        Route::get('/',[ProductController::class,'manage_product'])->name('product.manage');
        Route::get('/add_product',[ProductController::class,'add'])->name('product.add');
        Route::post('/stor_product}',[ProductController::class,'store'])->name('product.store');
        Route::get('/edit_product/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/update_product/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/destroy_product/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    }
);
Route::post('/order',[OrderController::class,'store'])->name('order.store');
Route::get('dashboard/order',[OrderController::class,'index'])->middleware(['auth'])->name('order.manage');
Route::post('dashboard/order-confirm',[OrderController::class,'confirm'])->middleware(['auth'])->name('order.confirm');



require __DIR__.'/auth.php';