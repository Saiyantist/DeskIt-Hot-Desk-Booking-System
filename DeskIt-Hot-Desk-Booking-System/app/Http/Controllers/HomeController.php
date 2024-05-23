<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bookings;
use App\Models\Desk;
use App\Models\User;

class HomeController extends Controller
{
    public function show(): View {
        return view('booking.calendar');
    }

   
    public function notif(): View {
        return view('home.notif');
    }

    public function show1(): View {
        $userId = auth()->id();
        $today = Carbon::today()->toDateString();
        
        $todaysBooking = Bookings::with('desk')
            ->where('user_id', $userId)
            ->where('booking_date', $today)
            ->first();
            
        $upcomingBookings = Bookings::with('desk')
            ->where('user_id', $userId)
            ->where('booking_date', '>', $today)
            ->orderBy('booking_date', 'asc')
            ->get();

        return view('dashboard', compact('todaysBooking', 'upcomingBookings'));
    }
    public function getUserBookings($userId) {
        $userBookings = Bookings::where('user_id', $userId)
            ->where('status', '!=', 'canceled') // Exclude canceled bookings
            ->get(['booking_date', 'status', 'desk_id']);

        $events = [];
        foreach ($userBookings as $booking) {
            $bookingDate = $booking->booking_date;
            $deskID = $booking->desk_id;

            $desk = Desk::find($deskID);

            if ($desk) {
                $deskNum = $desk->desk_num;

                $floor = $deskID <= 36 ? 1 : 2;

                $events[] = [
                    'title' => 'Floor ' . $floor . ' - ' . 'Desk ' . $deskNum,
                    'start' => $bookingDate,
                    'end' => $bookingDate,
                ];
            }
        }

        return response()->json($events);
    }
}
