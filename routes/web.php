<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('bai-viet/{slug}', [App\Http\Controllers\ProductController::class, 'details'])->name('product.details');
Route::post('upload/image', [App\Http\Controllers\HomeController::class, 'uploadImageCkeditor'])->name('upload.image');

Route::get('category/{slug}', [App\Http\Controllers\ProductController::class, 'productByCategory'])->name('category.product');
Route::get('tag/{slug}', [App\Http\Controllers\ProductController::class, 'productByTag'])->name('tag.product');

Route::get('search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('ds-bai-viet/{id}', [App\Http\Controllers\HomeController::class, 'listProduct'])->name('product.list');

Route::get('master/login', [App\Http\Controllers\HomeController::class, 'masterLogin'])->name('master.login');

Route::group(['as' => 'master.', 'prefix' => 'master',  'middleware' => 'master'], function () {
    Route::get('dashboard', [App\Http\Controllers\Master\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tag', App\Http\Controllers\Master\TagController::class);
    Route::resource('category', App\Http\Controllers\Master\CategoryController::class);

    Route::resource('user', App\Http\Controllers\Master\UserController::class);
    Route::put('password-update', [ App\Http\Controllers\Master\UserController::class, 'updatePassword'])->name('password.update');
    Route::put('update-role/{id}', [ App\Http\Controllers\Master\UserController::class, 'updateRole'])->name('user.updateRole');
    Route::resource('product', App\Http\Controllers\Master\ProductController::class);
    Route::put('/product/{id}/approve', [App\Http\Controllers\Master\ProductController::class, 'approval'])->name('product.approve');
    Route::resource('order', App\Http\Controllers\Master\OrderController::class);
    Route::put('/order/{id}/approve', [App\Http\Controllers\Master\OrderController::class, 'approval'])->name('order.approve');
});

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'middleware' => 'customer'], function () {
    Route::get('account', [App\Http\Controllers\UserController::class, 'index'])->name('account');
    Route::get('gui-bai', [App\Http\Controllers\UserController::class, 'createProduct'])->name('product.create');
    Route::post('product/store', [App\Http\Controllers\UserController::class, 'storeProduct'])->name('product.store');
    Route::get('gui-bai/{id}', [App\Http\Controllers\UserController::class, 'updateProduct'])->name('product.update');
    Route::post('product/update/{product} ', [App\Http\Controllers\UserController::class, 'storeUpdateProduct'])->name('product.updated');
    Route::delete('delete/{product}', [App\Http\Controllers\UserController::class, 'destroyProduct'])->name('product.delete');
    Route::put('update/{id}', [ App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::put('password-update', [ App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.update');
    Route::post('favorite/{product}/add', [App\Http\Controllers\UserController::class, 'addFavorite'])->name('product.favorite');
    Route::get('favorite', [App\Http\Controllers\UserController::class, 'showFavorite'])->name('favorite.show');

});

Auth::routes();


