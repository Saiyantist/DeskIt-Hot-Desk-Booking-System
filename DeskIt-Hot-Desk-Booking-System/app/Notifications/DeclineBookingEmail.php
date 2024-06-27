<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use App\Models\Bookings;

class DeclineBookingEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $bookings = Bookings::all();

        foreach ($bookings as $booking) {
            $bookingDate = Carbon::parse($booking->booking_date)->format('F j, Y');
            $deskNumber = $booking->desk->desk_num;
            $floor = $booking->desk_id <= 36 ? 1 : 2;
            $time = $booking->booking_time;
        }

        return (new MailMessage)
                    ->subject('Desk Reservation Rejection')
                    ->line('Unfortunately, your booking has been rejected')
                    ->line('Booking Date: ' . $bookingDate)
                    ->line('Time: ' . $time)
                    ->line('Desk Number: ' . $deskNumber)
                    ->line('Floor: ' . $floor);
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            // 'booking_id' => $this->booking->id,
            // 'booking_date' => $this->booking->booking_date,
            // 'booking_time' => $this->booking->booking_time,
            // 'desk_num' => $this->booking->desk->desk_num,
            // 'floor' => $this->booking->desk_id <= 36 ? 1 : 2,
        ];
    }
}
