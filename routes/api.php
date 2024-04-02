<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/apartments', [ApartmentController::class, 'index']);

Route::get('/apartment/{slug}', [ApartmentController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/orders/generate', [OrderController::class, 'generate']);

Route::post('orders/make/payments', [OrderController::class, 'makePayment']);

Route::post('/contact', [MessageController::class, 'store']);

Route::get('/search', [ApartmentController::class, 'search']);
