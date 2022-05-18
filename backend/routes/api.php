<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/category', CategoryController::class);
Route::resource('/request', RequestController::class);
Route::resource('/product', ProductController::class);

Route::get('/image/get/{id}', [ImageController::class, 'getImage'])
    ->name('image.get');
Route::post('/image/create/{id}', [ImageController::class, 'store'])
    ->name('image.create');
Route::delete('/image/destroy/{image}', [ImageController::class, 'destroy'])
    ->name('image.destroy');
