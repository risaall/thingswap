

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Endpoint API untuk produk
Route::get('/products', [ProductController::class, 'indexApi']);
Route::post('/products', [ProductController::class, 'storeApi']);

