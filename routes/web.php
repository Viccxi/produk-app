<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $totalCategories = Category::count();

    $chartData = Category::withCount('products')
        ->get(['name', 'products_count']);

    return view('dashboard', compact('totalProducts', 'totalCategories', 'chartData'));
})->middleware(['auth'])->name('dashboard');
