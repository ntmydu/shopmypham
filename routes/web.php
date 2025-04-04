<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\LoginAdController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\UesrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductFeController;
use App\Http\Controllers\Admin\OrderAdController;


use App\Models\Product;
use Illuminate\Support\Facades\Route;



//--Admin--
Route::get('/admin', [LoginAdController::class, 'index'])->name('admin');
Route::post('/admin/login', [LoginAdController::class, 'login'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        route::get('dashboard',  [MainController::class, 'index'])->name('admin');



        // --User--
        Route::get('user/add', [UesrController::class, 'create']);
        Route::post('user/add', [UesrController::class, 'store'])->name('user.store');
        Route::get('user/list', [UesrController::class, 'index']);
        Route::get('user/view/{id}', [UesrController::class, 'view'])->name('user.view');
        Route::delete('user/destroy/{id}', [UesrController::class, 'destroy'])->name('user.destroy');
        Route::get('user/edit/{id}', [UesrController::class, 'show'])->name('user.edit');
        Route::post('user/edit/{id}', [UesrController::class, 'update'])->name('user.update');
        Route::get('/user/search', [UesrController::class, 'search'])->name('user.search');

        // --Menu--
        Route::get('menu/add', [MenuController::class, 'create']);
        Route::post('menu/add', [MenuController::class, 'store']);
        Route::get('menu/list', [MenuController::class, 'index']);
        Route::delete('menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
        Route::get('menu/edit/{id}', [MenuController::class, 'show'])->name('menu.edit');
        Route::post('menu/edit/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');

        // --Product--
        Route::get('product/add', [ProductController::class, 'create']);
        Route::post('product/add', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/list', [ProductController::class, 'index']);
        Route::get('product/edit/{id}', [ProductController::class, 'show'])->name('product.edit');
        Route::post('product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
        // --Slider--
        Route::get('/slide/add', [SliderController::class, 'create']);
        Route::post('/slide/add', [SliderController::class, 'store'])->name('slide.store');
        Route::get('/slide/list', [SliderController::class, 'index']);
        Route::get('slide/edit/{id}', [SliderController::class, 'show'])->name('slide.edit');
        Route::post('slide/edit/{id}', [SliderController::class, 'update'])->name('slide.update');
        Route::DELETE('/slide/destroy/{id}', [SliderController::class, 'destroy'])->name('slide.destroy');
        // --Order--
        Route::get('/order/list', [OrderAdController::class, 'index']);
        Route::get('/order/detail/{id}', [OrderAdController::class, 'view'])->name('order.detail');
        Route::get('/order/search', [OrderAdController::class, 'search'])->name('order.search');

        // --Discount--
        Route::get('discount/add', [DiscountController::class, 'create']);
        Route::post('discount/add', [DiscountController::class, 'store'])->name('discount.store');
        Route::get('discount/list', [DiscountController::class, 'index'])->name('discount.list');
        Route::get('discount/edit/{id}', [DiscountController::class, 'show'])->name('discount.edit');
        Route::post('discount/edit/{id}', [DiscountController::class, 'update'])->name('discount.update');
        Route::DELETE('discount/destroy/{id}', [DiscountController::class, 'destroy'])->name('discount.destroy');
        Route::get('/discount/search', [DiscountController::class, 'search'])->name('discount.search');

        Route::get('/logout', [LoginAdController::class, 'logout'])->name('admin.logout');

        Route::get('add', [TestController::class, 'create']);
        Route::post('add', [TestController::class, 'store'])->name('add');
    });
});





//--fontend--

//Users
Route::get('/regis', [UesrController::class, 'formregis']);
Route::post('/regis', [UesrController::class, 'regis'])->name('regis');
Route::get('/login', [UesrController::class, 'showlogin'])->name('view.login');
Route::post('/login', [UesrController::class, 'login'])->name('login');
Route::get('/logout', [UesrController::class, 'logout'])->name('logout');
// --Cart--
Route::post('/add/cart', [CartController::class, 'create'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::get('/cart/minus/{id}', [CartController::class, 'minusQuantity'])->name('cart.minus');
Route::get('/cart/plus/{id}', [CartController::class, 'plusQuantity'])->name('cart.plus');
Route::delete('/destroy/cart/{id}', [CartController::class, 'delete'])->name('cart.destroy');


//--homepage--
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/search', [HomeController::class, 'search'])->name('search');
// Route::get('/show{id}', [HomeController::class, 'show'])->name('show');


// --Product--
Route::get('/product/detail/{order}', [ProductFeController::class, 'index'])->name('product.detail');
Route::get('/product/list/{id}', [ProductFeController::class, 'show'])->name('product.list');
Route::post('product/review', [ProductFeController::class, 'addReview'])->name('product.review');

//--Order--
Route::post('/order/confirm', [OrderController::class, 'showconfirm'])->name('order.confirm');
Route::get('/order/review', [OrderController::class, 'reviewOrder'])->name('order.review');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/applyDiscount', [OrderController::class, 'applydiscount'])->name('discount.apply');
Route::post('/add/order', [OrderController::class, 'create'])->name('order.add');