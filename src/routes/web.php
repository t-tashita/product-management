<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/search', [ProductsController::class, 'search']);
Route::get('/products/register', [ProductsController::class, 'register']);
Route::post('/products/register', [ProductsController::class, 'store']);
Route::get('/products/{productId}', [ProductsController::class, 'detail']);
Route::patch('/products/{productId}/update', [ProductsController::class, 'update']);
Route::post('/products/{productId}/delete', [ProductsController::class, 'destroy']);