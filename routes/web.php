<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as DashboardController;
use App\Http\Controllers\User\ApartmentController as ApartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->name('user.')->prefix('user')->group(function () {
    Route::get('/dashboard', [Dashboardcontroller::class, 'index'])->name('dashboard');

    Route::resource('/apartment', ApartmentController::class)->parameters([
        'apartment' => 'apartment:slug'
    ]);
});


// Definizione della rotta di fallback per il "Not Found"
Route::fallback(function () {
    // Ritorna una risposta con il codice di stato 404 (Not Found)
    return response()->view('errors.404', [], 404);
});

Route::get('/not-authorized', function () {
    return view('not_authorized');
})->name('not.authorized');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
