<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Livewire\Booking;
use App\Models\User;

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

Route::get('/dbconn', function () {
    if (DB::connection()->getPdo()){
        return "successfully Connected to DB: " . DB::connection()->getDatabaseName();
    };
});

Route::get('a', function () {
    if(auth()->user()){
        auth()->user()->roles()->detach();
        auth()->user()->assignRole('admin');
    }
    return ('assigned admin role');
});

Route::get('sa', function () {
    if(auth()->user()){
        auth()->user()->roles()->detach();
        auth()->user()->assignRole('superadmin');
    }
    return ('assigned superadmin role');
});

Route::get('om', function () {
    if(auth()->user()){
        auth()->user()->roles()->detach();
        auth()->user()->assignRole('officemanager');
    }
    return ('assigned officemanager role');
});

Route::get('e', function () {
    if(auth()->user()){
        auth()->user()->roles()->detach();
        auth()->user()->assignRole('employee');
    }
    return ('assigned employee role');
});

Route::get('empAll', function () {
    $users = User::all();  
    foreach ($users as $user){
        $user->roles()->detach();
        $user->assignRole('employee');
    }
    return ('assigned employee role to all users.');
});

Route::get('rAll', function () {
    $users = User::all();
    foreach ($users as $user){
        $user->roles()->detach();
        $user->removeRole('employee');
    }
    auth()->user()->assignRole('admin');
    return ('removed employee role to all users except current user.');
});

Route::get('r', function () {
    auth()->user()->roles()->detach();
    return ('detached all roles');
});



/** LANDING Page */
Route::get('/', function (){ return redirect('/welcome');});
Route::get('/welcome', [WelcomeController::class, 'show'])->name('welcome');
Route::get('/frequently-Asked-Questions', [WelcomeController::class, 'show1'])->name('faq');
Route::get('/privacy-policy', [WelcomeController::class, 'show2'])->name('privacyPolicy');
Route::get('/guides', [WelcomeController::class, 'show3'])->name('guides');
Route::get('/waiting', [WelcomeController::class, 'show4'])->name('waiting');



/** 
 * AUTHENTICATION to Dashboard
 *  - Verifying if user hasRole(user or admin)
 */


Route::get('/dashboard', function () {
    $user = Auth::user();
  
    /** ADMINS */   
    if ($user->hasAnyRole(['superadmin', 'admin', 'officemanager'])) {return view('admin.dashboard'); } 

    /** EMPLOYEE */
    if ($user->hasRole('employee')) {return view('home.dashboard'); }   
  
    /** NO ROLE */
    elseif (!$user->hasAnyRole(['superadmin', 'admin', 'officemanager', 'employee'])) {return redirect()->route('waiting'); }
  
    // Default fallback (this should not happen under normal circumstances)
    else {return abort(403, 'Unauthorized'); }
  
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware(['auth', 'role:admin', 'verified']) ->group(function () {
//     Route::get('/notification', [HomeController::class,'notif'])->name('notif');

// });



/**
 * PROFILE Routes (MyAccount)
 */
Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * HOME Routes
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/notification', [HomeController::class,'notif'])->name('notif');
    Route::get('/user/bookings/{userId}', [HomeController::class, 'getUserBookings'])->name('user.bookings');
    Route::get('/user/profile', function () {
        return view('admin.profile');
        // changed from home.profile, because it exposes an admin page (admin.profile).
    })->name('userProfile');
    Route::get('/user/support', function () {
        return view('support.support');
    })->name('userSupport');
    Route::get('/user/booking-history', function () {
        return view('home.bookingHistory');
    })->name('booking-history');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});


/**
 * BOOKING Routes
 */
Route::middleware(['auth', 'role:employee|admin', 'verified'])->prefix('booking')->group(function () {
    
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
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('home');
    Route::get('/admin/desk-book', function () {
        return view('admin.bookBehalf');
    })->name('book-behalf');
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
    Route::get('/admin/support', function () {
        return view('support.support');
    })->name('support');
    Route::get('/admin/feedbacks-reports', function () {
        return view('admin.feedbacks-reports');
    })->name('feedbacks-reports');
});


require __DIR__.'/auth.php';
