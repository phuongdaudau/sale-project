<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('product/{slug}', [App\Http\Controllers\ProductController::class, 'details'])->name('product.details');

Route::get('category/{slug}', [App\Http\Controllers\ProductController::class, 'productByCategory'])->name('category.product');
Route::get('tag/{slug}', [App\Http\Controllers\ProductController::class, 'productByTag'])->name('tag.product');

Route::get('search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::group(['as' => 'master.', 'prefix' => 'master',  'middleware' => 'master'], function () {
    Route::get('dashboard', [App\Http\Controllers\Master\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tag', App\Http\Controllers\Master\TagController::class);
    Route::resource('category', App\Http\Controllers\Master\CategoryController::class);
    Route::resource('warehouse', App\Http\Controllers\Master\WarehouseController::class);
    Route::resource('ship', App\Http\Controllers\Master\ShipController::class);
    Route::resource('user', App\Http\Controllers\Master\UserController::class);
    Route::put('password-update', [ App\Http\Controllers\Master\UserController::class, 'updatePassword'])->name('password.update');
    Route::put('update-role/{id}', [ App\Http\Controllers\Master\UserController::class, 'updateRole'])->name('user.updateRole');
    Route::resource('product', App\Http\Controllers\Master\ProductController::class);
    Route::put('/product/{id}/approve', [App\Http\Controllers\Master\ProductController::class, 'approval'])->name('product.approve');
    Route::resource('order', App\Http\Controllers\Master\OrderController::class);
    Route::put('/order/{id}/approve', [App\Http\Controllers\Master\OrderController::class, 'approval'])->name('order.approve');
});

Route::group(['as' => 'staff.', 'prefix' => 'staff', 'middleware' => 'staff'], function () {
    Route::get('dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->name('dashboard');
    Route::get('warehouse', [App\Http\Controllers\Staff\DashboardController::class, 'warehouse'])->name('warehouse');
    Route::get('ship', [App\Http\Controllers\Staff\DashboardController::class, 'ship'])->name('ship');
    Route::resource('user', App\Http\Controllers\Staff\UserController::class);
    Route::put('password-update', [ App\Http\Controllers\Staff\UserController::class, 'updatePassword'])->name('password.update');
    Route::resource('tag', App\Http\Controllers\Staff\TagController::class);
    Route::resource('category', App\Http\Controllers\Staff\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Staff\ProductController::class);
    Route::resource('order', App\Http\Controllers\Staff\OrderController::class);

});

Route::group(['as' => 'shipper.', 'prefix' => 'shipper', 'middleware' => 'shipper'], function () {
    Route::get('dashboard', [App\Http\Controllers\Shipper\DashboardController::class, 'index'])->name('dashboard');
    Route::get('order/{id}', [App\Http\Controllers\Shipper\DashboardController::class, 'order'])->name('order');
    Route::get('update/{id}', [App\Http\Controllers\Shipper\DashboardController::class, 'update'])->name('update');
    Route::put('updateShip/{id}', [App\Http\Controllers\Shipper\DashboardController::class, 'updateShip'])->name('updateShip');
    Route::resource('user', App\Http\Controllers\Shipper\UserController::class);
    Route::put('password-update', [ App\Http\Controllers\Shipper\UserController::class, 'updatePassword'])->name('password.update');
});
                                                
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'middleware' => 'customer'], function () {
    Route::get('account', [App\Http\Controllers\UserController::class, 'index'])->name('account');
    Route::put('update/{id}', [ App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::put('password-update', [ App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.update');
    Route::post('favorite/{product}/add', [App\Http\Controllers\UserController::class, 'addFavorite'])->name('product.favorite');
    Route::get('favorite', [App\Http\Controllers\UserController::class, 'showFavorite'])->name('favorite.show');

    Route::get('addCart/{id}', [App\Http\Controllers\CartController::class, 'addCart'])->name('cart.add');
});

Auth::routes();


