<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ViewController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::get('/apartments', [ApartmentController::class, 'index']);

Route::get('/sposorized/apartments', [ApartmentController::class, 'sposorized']);

Route::get('/apartment/{slug}', [ApartmentController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ServiceController::class, 'services']);

Route::get('/orders/generate', [OrderController::class, 'generate']);

Route::post('orders/make/payments', [OrderController::class, 'makePayment']);

Route::get('/getIP', [ViewController::class, 'getIP']);

Route::post('/view', [ViewController::class, 'store']);

Route::post('/contact', [MessageController::class, 'store']);

Route::get('/search', [ApartmentController::class, 'search']);
