<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class UpcomingBookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $bookingDate = \Carbon\Carbon::parse($this->booking->booking_date)->format('F j, Y');
        
        return (new MailMessage)
                    ->subject('Upcoming Booking Reminder')
                    ->line('Hello! Just a reminder that you have an upcoming booking.')
                    ->line('Booking Date: ' . $bookingDate)
                    ->line('Thank you for using DeskIt!');
    }

    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'booking_date' => $this->booking->booking_date,
        ];
    }
}
