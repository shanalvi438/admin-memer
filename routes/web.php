<?php

use App\Http\Controllers\MemeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Auth::routes();
Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [CategoryController::class, 'index']);

    Route::resource('/category', CategoryController::class)->except('show');

    Route::resource('/category.memes', MemeController::class)->shallow();

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
