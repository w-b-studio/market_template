<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

Route::resource('category', CategoryController::class);
Route::resource('request', RequestController::class);
Route::resource('product', ProductController::class);

Route::get('image/create/{product}', [ImageController::class, 'create'])
    ->name('image.create');
Route::post('image/store', [ImageController::class, 'store'])
    ->name('image.store');
Route::delete('image/destroy/{image}', [ImageController::class, 'destroy'])
    ->name('image.destroy');
