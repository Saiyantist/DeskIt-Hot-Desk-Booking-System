<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'show'])->name('welcome');
Route::get('/login', [UserController::class, 'show'])->name('login');

Route::get('/dashboard', function () {
    $user = Auth::user();

    $hasAllowedRole = $user->hasAnyRole('admin', 'superadmin');


    if ($hasAllowedRole === 'admin') {
        return view('admin.dashboard');
    }
    if ($hasAllowedRole === 'superadmin') {
        return view('superadmin.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('home/booking')->group(function () {

    Route::get('/calendar', [HomeController::class,'show'])->name('home.booking.calendar');
    Route::get('/notification', [HomeController::class,'notif'])->name('home.notif');

    
    Route::get('/book', [BookingController::class,'book'])->name('home.book');
    Route::get('/desks', [BookingController::class,'desks'])->name('home.booking.desks');
    Route::get('/floor1', [BookingController::class,'floor1'])->name('home.booking.floor1');
    Route::post('/floor1', [BookingController::class, 'storeBookingDate']);
    Route::post('/floor1', [BookingController::class, 'storeBookingDesk']);
    Route::get('/floor2', [BookingController::class,'floor2'])->name('home.booking.floor2');
    Route::post('/floor2', [BookingController::class, 'store']);

});

require __DIR__.'/auth.php';
