<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('home/booking')->group(function () {
    Route::get('/calendar', [HomeController::class,'show'])->name('home.booking.calendar');
    Route::get('/floor', [HomeController::class,'floor'])->name('home.booking.floor');
    Route::get('/floor1', [HomeController::class,'floor1'])->name('home.booking.floor1');
    Route::get('/floor2', [HomeController::class,'floor2'])->name('home.booking.floor2');
    Route::get('/notification', [HomeController::class,'notif'])->name('home.notif');
});

require __DIR__.'/auth.php';
