<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View {
        return view('home.booking.calendar');
    }

    public function floor(): View {
        return view('home.booking.floor');
    }
    public function floor1(): View {
        return view('home.booking.floor1');
    }
    public function floor2(): View {
        return view('home.booking.floor2');
    }
    public function notif(): View {
        return view('home.notif');
    }
}
