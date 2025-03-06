<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
