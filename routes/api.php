<?php

use App\Http\Controllers\Api\MemesController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{category}/memes', [MemesController::class, 'categoryMemes']);

Route::post('/memes/filter/by-name', [MemesController::class, 'searchByName']);
