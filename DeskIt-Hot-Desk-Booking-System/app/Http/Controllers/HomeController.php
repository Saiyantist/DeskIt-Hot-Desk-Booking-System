<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bookings;
use App\Models\Desk;

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
        // $desk = Desk::all()->get(['desk_num']);


        $events = [];
        foreach ($userBookings as $booking) {
            $bookingDate = $booking->booking_date;
            // $deskID = $booking->desk_id;

            // $desk = $desk[$deskID]->desk_num;

            $events[] = [
                'title' => ' Desk#: ' . $booking->desk_id,
                'start' => $bookingDate,
                'end' => $bookingDate,
            ];
        }

        return response()->json($events);
    }
}
