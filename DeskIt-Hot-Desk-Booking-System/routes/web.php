<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Booking;

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
//         auth()->user()->assignRole('admin');
//     }
//     return ('hello');
// });


/** LANDING Page */
Route::get('/', [WelcomeController::class, 'show'])->name('welcome');
Route::get('/frequently-Asked-Questions', [WelcomeController::class, 'show1'])->name('faq');
Route::get('/privacy-policy', [WelcomeController::class, 'show2'])->name('privacyPolicy');
Route::get('/guides', [WelcomeController::class, 'show3'])->name('guides');



/** AUTHENTICATION to Dashboard
 *  - Verifying if user hasRole(user or admin)  */
Route::get('/dashboard', function () {
    $user = Auth::user();

    $hasAllowedRole = $user->hasAnyRole('admin');

    if ($hasAllowedRole) {
        if ($user->hasRole('admin')) {return view('admin.dashboard');  }   /** ADMIN */                 
    }
    return view('home.dashboard');   /** USER  */ 
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin', 'verified']) ->group(function () {
    Route::get('/notification', [HomeController::class,'notif'])->name('notif');

});



/** PROFILE Routes (MyAccount) */
Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/** HOME Routes */
Route::middleware('auth')->group(function () {
    Route::get('/notification', [HomeController::class,'notif'])->name('notif');
    Route::get('/dashboard', [HomeController::class, 'showBookings'])->name('dashboard');
});



/** BOOKING Routes */
Route::middleware('auth')->prefix('booking')->group(function () {
    
    /** The 2 pages of the Booking Flow */
    Route::get('/', [BookingController::class,'show'])->name('book');
    Route::get('/desks', [BookingController::class,'showDesks'])->name('showDesks');
    

    // Hindi muna need sa ngayon, pero dito lang muna
    Route::get('/calendar', [HomeController::class,'show'])->name('calendar');
    Route::get('/floor1', [BookingController::class,'floor1'])->name('booking.floor1');
    Route::post('/floor1', [BookingController::class, 'storeBookingDate']);
    Route::post('/floor1', [BookingController::class, 'storeBookingDesk']);
    Route::get('/floor2', [BookingController::class,'floor2'])->name('booking.floor2');
    Route::post('/floor2', [BookingController::class, 'store']);
});




/** ADMIN UI Routes */

// Insecure way to ADMIN Dashboard - FOR DEVELOPMENT PURPOSES
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('home');
    Route::get('/admin/desk-map', function () {
        return view('admin.deskMap');
    })->name('map');
    Route::get('/admin/booking-history', function () {
        return view('admin.bookingHistory');
    })->name('history');
    Route::get('/admin/profile', function () {
        return view('admin.profile');
    })->name('profile');
    Route::get('/admin/profile-edit', function () {
        return view('admin.profileEdit');
    })->name('profile-edit');
});


require __DIR__.'/auth.php';
