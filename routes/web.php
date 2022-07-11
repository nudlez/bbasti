<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::match(['post', 'get'], '/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/item/{id}', [PagesController::class, 'itemPage'])->name('item-page');

Route::group(['prefix'=>'user', 'controller'=>UserController::class], function() {
    Route::get('/dashboard', 'index')->name('user.home');
});

Route::post('/cart/add', [CartController::class, 'cart_add'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'cart_get'])->name('cart.get');