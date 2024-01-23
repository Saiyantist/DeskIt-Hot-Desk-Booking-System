<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function show(): View {
        return view('booking.calendar');
    }

   
    public function notif(): View {
        return view('home.notif');
    }

    public function __invoke()
    {
        $events = [];
 
        $appointments = Appointment::with(['client', 'employee'])->get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }
 
        return view('home.dashboard', compact('events'));
    }
}
