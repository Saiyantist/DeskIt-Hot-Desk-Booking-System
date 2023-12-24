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

// Route::get('n', function () {
//     if(auth()->user()){
//         auth()->user()->assignRole('employee');
//     }
//     return ('hello');
// });

Route::get('/', [WelcomeController::class, 'show'])->name('welcome');
Route::get('/login', [UserController::class, 'show'])->name('login');

//verification if user has any roles
Route::get('/dashboard', function () {
    $user = Auth::user();

    $hasAllowedRole = $user->hasAnyRole('admin', 'superadmin');

    if ($hasAllowedRole) {
        if ($user->hasRole('admin')) {
            return view('admin.dashboard');
        } elseif ($user->hasRole('superadmin')) {
            return view('superadmin.dashboard');
        }
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//get to the admin page
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

//get to the super admin page
Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
})->middleware(['auth', 'verified'])->name('superadmin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.profile');
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
