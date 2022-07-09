<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

//admin pages
Route::match(['post', 'get'], '/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::group(['prefix'=>'admin', 'controller'=>AdminController::class], function () {
    Route::get('/dashboard', 'index')->name('admin.home');
    Route::get('/items', 'items')->name('admin.items');
    Route::get('/item/{id}', 'itemPage')->name('admin.item');
    Route::post('/item/edit/{id}', 'itemEdit')->name('admin.item-edit');
    Route::post('/item/change-image/{id}', 'changeImage')->name('admin.change-img');
    Route::match(['post','get'], '/item-add', 'itemAdd')->name('admin.item-add');
    Route::get('/item/delete/{id}', 'itemDelete')->name('admin.item-delete');

    Route::get('/users', 'getUsers')->name('admin.users');
    Route::get('/users/{id}', 'userSingle')->name('admin.user');
});