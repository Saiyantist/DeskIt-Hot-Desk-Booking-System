<?php

namespace App\Console;

use App\Models\Bookings;
use App\Notifications\UpcomingBookingNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

            // Log the start of the notification process
            Log::info("Starting to send upcoming booking notifications for {$tomorrow}");

            DB::transaction(function () use ($tomorrow) {
                $bookings = Bookings::whereDate('booking_date', $tomorrow)->get();

                $bookings->chunk(100, function ($bookingsChunk) {
                    foreach ($bookingsChunk as $booking) {
                        try {
                            $booking->user->notify(new UpcomingBookingNotification($booking));
                            Log::info("Notification sent to user {$booking->user->id} for booking {$booking->id}");
                        } catch (\Exception $e) {
                            Log::error("Failed to send notification for booking {$booking->id}: {$e->getMessage()}");
                        }
                    }
                });
            });

            // Log the end of the notification process
            Log::info("Finished sending upcoming booking notifications for {$tomorrow}");
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
