<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View {
        return view('booking.calendar');
    }

   
    public function notif(): View {
        return view('home.notif');
    }

    public function showBookings()
    {
        $user = User::with('bookings')->find(auth()->id());

        return view('home.dashboard', compact('user'));
    }

}
