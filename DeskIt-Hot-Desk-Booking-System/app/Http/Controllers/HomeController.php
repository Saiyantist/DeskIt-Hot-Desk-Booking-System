<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bookings;

class HomeController extends Controller
{
    public function show(): View {
        return view('booking.calendar');
    }

   
    public function notif(): View {
        return view('home.notif');
    }

    public function getUserBookings($userId) {
        $userBookings = Bookings::where('user_id', $userId)->get(['booking_date', 'status', 'desk_id']);

        $events = [];
        foreach ($userBookings as $booking) {
            $bookingDate = $booking->booking_date;

            $events[] = [
                'title' => 'Status: ' . $booking->status . ' Desk#: ' . $booking->desk_id,
                'start' => $bookingDate,
                'end' => $bookingDate,
            ];
        }

        return response()->json($events);
    }
}
