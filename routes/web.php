<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduledClassController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('teacher/schedule', ScheduledClassController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'verified', 'role:teacher']);


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');


Route::get('teacher/dashboard', function () {
    return view('teacher.dashboard');
})->middleware(['auth', 'verified', 'role:teacher'])->name('teacher.dashboard');


// Route::get('student/dashboard', function () {
//     return view('student.dashboard');
// })->middleware(['auth', 'verified', 'role:student'])->name('student.dashboard');



Route::middleware(['auth', 'verified', 'role:student'])->group(function () {

    Route::view('student/dashboard', 'student.dashboard')->name('student.dashboard');
    Route::get('student/bookings', [BookingController::class, 'index'])->name('booking.index');
    
    Route::get('student/book', [BookingController::class, 'create'])->name('booking.create');
    Route::post('student/book', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('student/{id}/book', [BookingController::class, 'destroy'])->name('booking.destroy');
  
});

// Route::get('student/book',[BookingController::class,'create'])->middleware(['auth', 'verified', 'role:student'])->name('booking.create');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
