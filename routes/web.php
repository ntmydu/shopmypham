<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\LoginAdController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\UesrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductFeController;

use App\Models\Product;
use Illuminate\Support\Facades\Route;



//--Admin--
Route::get('/admin/login', [LoginAdController::class, 'index'])->name('admin');
Route::post('/admin/login', [LoginAdController::class, 'login'])->name('admin.login');
// Route::middleware(['auth'])->group(function () {
// Route::prefix('admin', 'saler')->group(function () {
route::get('/admin',  [MainController::class, 'index']);
//--User--
Route::get('/admin/user/add', [UesrController::class, 'create']);
Route::post('/admin/user/add', [UesrController::class, 'store'])->name('user.store');
Route::get('/admin/user/list', [UesrController::class, 'index']);
Route::get('/admin/user/view/{id}', [UesrController::class, 'view'])->name('user.view');
Route::delete('/admin/user/destroy/{id}', [UesrController::class, 'destroy'])->name('user.destroy');
Route::get('/admin/user/edit/{id}', [UesrController::class, 'show'])->name('user.edit');
Route::post('/admin/user/edit/{id}', [UesrController::class, 'update'])->name('user.update');
// --Menu--
Route::get('/admin/menu/add', [MenuController::class, 'create']);
Route::post('/admin/menu/add', [MenuController::class, 'store']);
Route::get('/admin/menu/list', [MenuController::class, 'index']);
Route::delete('/admin/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/admin/menu/edit/{id}', [MenuController::class, 'show'])->name('menu.edit');
Route::post('/admin/menu/edit/{id}', [MenuController::class, 'update'])->name('menu.update');

// --Product--
Route::get('/admin/product/add', [ProductController::class, 'create']);
Route::post('add', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/product/list', [ProductController::class, 'index']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'show'])->name('product.edit');
Route::post('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// --Slider--
Route::get('admin/slide/add', [SliderController::class, 'create']);
Route::post('admin/slide/add', [SliderController::class, 'store'])->name('slide.store');
Route::get('admin/slide/list', [SliderController::class, 'index']);
Route::get('/admin/slide/edit/{id}', [SliderController::class, 'show'])->name('slide.edit');
Route::post('/admin/slide/edit/{id}', [SliderController::class, 'update'])->name('slide.update');
Route::DELETE('admin/slide/destroy/{id}', [SliderController::class, 'destroy'])->name('slide.destroy');
// });
// });


//--fontend--

//Users
Route::get('/regis', [UesrController::class, 'formregis']);
Route::post('/regis', [UesrController::class, 'regis'])->name('regis');

// --Cart--
Route::post('/add/cart', [CartController::class, 'create'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::get('/cart/minus/{id}', [CartController::class, 'minusQuantity'])->name('cart.minus');
Route::get('/cart/plus/{id}', [CartController::class, 'plusQuantity'])->name('cart.plus');
Route::delete('/destroy/cart/{id}', [CartController::class, 'delete'])->name('cart.destroy');


//--homepage--
Route::get('/', [HomeController::class, 'index']);
// Route::get('/show{id}', [HomeController::class, 'show'])->name('show');


// --Product--
Route::get('/product/detail/{id}', [ProductFeController::class, 'index'])->name('product.detail');
Route::get('/product/list/{id}', [ProductFeController::class, 'show'])->name('product.list');

//--Order--
Route::post('/order/confirm', [OrderController::class, 'showconfirm'])->name('order.confirm');
Route::get('/order/review', [OrderController::class, 'reviewOrder'])->name('order.review');
Route::get('/order', [OrderController::class, 'index'])->name('order');