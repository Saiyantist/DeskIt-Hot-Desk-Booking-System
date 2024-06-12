<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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
        return (new MailMessage)
                    ->subject('Hello! Just a reminder')
                    ->line('You have an upcoming booking on ' . $this->booking->booking_date)
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