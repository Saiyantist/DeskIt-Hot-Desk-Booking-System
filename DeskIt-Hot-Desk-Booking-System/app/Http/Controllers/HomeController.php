<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bookings;
use App\Models\Desk;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function show(): View {
        return view('booking.calendar');
    }

   
    public function notif(): View {
        return view('home.notif');
    }

    public function dashboard(): View {
        $user = auth()->user();
    
        if ($user->hasAnyRole(['superadmin', 'admin', 'officemanager'])) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('employee')) {
            $userId = $user->id;
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
    
            if ($todaysBooking) {
                $deskId = $todaysBooking->desk_id;
                $floor = $deskId <= 36 ? 1 : 2;
                $todaysBooking->floor = $floor;
            }
                
    
            foreach ($upcomingBookings as $booking) {
                $deskId = $booking->desk_id;
                $floor = $deskId <= 36 ? 1 : 2;
                $booking->floor = $floor;
            }
    
            return view('home.dashboard', compact('todaysBooking', 'upcomingBookings'));
        } else {
            abort(403, 'Unauthorized');
        }
    }
    public function getUserBookings($userId) {
        $userBookings = Bookings::where('user_id', $userId)
            ->where('status', '!=', 'canceled') 
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
