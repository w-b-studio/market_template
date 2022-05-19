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

Route::get('/category',[ CategoryController::class, 'index']);
Route::post('/category', [ CategoryController::class, 'store']);
Route::delete('/category/{id}', [ CategoryController::class, 'destroy']);
Route::get('/category/{id}', [CategoryController::class, 'getCategoryById']);
Route::resource('/request', RequestController::class);
Route::get('/product', [ ProductController::class, 'index']);
Route::post('/product', [ ProductController::class, 'store']);
Route::delete('/product/{id}', [ ProductController::class, 'deleteProduct']);

Route::get('/image/get/{id}', [ImageController::class, 'getImage'])
    ->name('image.get');
Route::post('/create_image/{id}', [ImageController::class, 'createImage']);
Route::delete('/image/destroy/{image}', [ImageController::class, 'destroy'])
    ->name('image.destroy');
