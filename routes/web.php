<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::get('/product', [ProductController::class, 'showProducts'])->name('products');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/', function () {
    return view('welcome');
});