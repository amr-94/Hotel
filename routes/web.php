<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Front\FrontContrller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//client front
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');
Route::get('/', [FrontContrller::class, 'index'])->name('front.index');
Route::get('show/room/{id}', [FrontContrller::class, 'show'])->name('front.show');




require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';