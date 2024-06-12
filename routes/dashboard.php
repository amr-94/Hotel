<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'lastactivity', 'admin', 'employee']], function () {
    // Rooms
    Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('rooms/{room:id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('rooms/{room:id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('rooms/{room:id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('rooms/{room:id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    // Bookings
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    // Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings/{booking:id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('bookings/{booking:id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{booking:id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{booking:id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    //Admin and Employee
    Route::get('All/users', [AdminController::class, 'allusers'])->name('All.users')->middleware('admin');
    Route::put('All/users/{id}', [AdminController::class, 'updateuser'])->name('update.users.from.admin')->middleware('admin');
    Route::delete('All/users/{id}', [AdminController::class, 'deleteuser'])->name('delete.user.from.admin')->middleware('admin');
    Route::get('All/bookrequest', [AdminController::class, 'allbookrequest'])->name('All.bookrequest');
    Route::put('All/approve/bookrequest/{id}', [AdminController::class, 'updatestatus'])->name('update.request.status');
    Route::delete('delete/bookrequest/{id}', [AdminController::class, 'deletebookrequest'])->name('delete.bookrequest');
});