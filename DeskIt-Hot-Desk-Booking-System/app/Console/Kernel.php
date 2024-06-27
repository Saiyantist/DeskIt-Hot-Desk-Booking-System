<?php

namespace App\Console;

use App\Models\Bookings;
use App\Notifications\UpcomingBookingNotification;
use App\Notifications\UserBookingNotification;
use Auth;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $tomorrow = now()->addDay()->toDateString();
            $bookings = Bookings::whereDate('booking_date', $tomorrow)->get();
            $user = Auth::user();
            foreach ($bookings as $booking) {
                if ($user->prefersNotification('booking_reminders_db')) {
                    $booking->user->notify(new UserBookingNotification($booking, 'employee'));
                }
                if ($user->prefersNotification('booking_reminders_email')) {
                    $booking->user->notify(new UpcomingBookingNotification($booking));
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
