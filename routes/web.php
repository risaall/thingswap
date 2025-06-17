<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDonationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductUserController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Untuk user biasa
Route::get('/home', function () {
    return view('user.home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/about', function () {
    return view('user.about');
})->name('about');





Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');



Route::get('/contribute', [DonationController::class, 'create'])->name('contribute');
Route::post('/contribute', [DonationController::class, 'store'])->name('donation.store');

Route::get('/product', [ProductUserController::class, 'index'])->name('user.products.index');
Route::get('/product/{id}', [ProductUserController::class, 'show'])->name('user.products.show');



// Admin Section
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::put('/donations/{donation}/status', [AdminDonationController::class, 'updateStatus'])->name('admin.donations.updateStatus');

    Route::resource('/donations', AdminDonationController::class)->names([
    'index'   => 'admin.donations.index',
    'create'  => 'admin.donations.create',
    'store'   => 'admin.donations.store',
    'edit'    => 'admin.donations.edit',
    'update'  => 'admin.donations.update',
    'destroy' => 'admin.donations.destroy',
    'show'    => 'admin.donations.show', // opsional
]);

    Route::resource('/products', ProductController::class)->names([
    'index'   => 'admin.products.index',
    'create'  => 'admin.products.create',
    'store'   => 'admin.products.store',
    'edit'    => 'admin.products.edit',
    'update'  => 'admin.products.update',
    'destroy' => 'admin.products.destroy',
    'show'    => 'admin.products.show', // opsional
]);

    Route::resource('/users', UserController::class)->names([
    'index'   => 'admin.users.index',
    'create'  => 'admin.users.create',
    'store'   => 'admin.users.store',
    'edit'    => 'admin.users.edit',
    'update'  => 'admin.users.update',
    'destroy' => 'admin.users.destroy',
    'show'    => 'admin.users.show', // opsional
]);

    Route::resource('/partners', PartnerController::class)->names([
        'index' => 'admin.partners.index',
        'create' => 'admin.partners.create',
        'store' => 'admin.partners.store',
        'edit' => 'admin.partners.edit',
        'update' => 'admin.partners.update',
        'destroy' => 'admin.partners.destroy',
        'show' => 'admin.partners.show',
    ]);

    Route::resource('/categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'show' => 'admin.categories.show',
    ]);
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
