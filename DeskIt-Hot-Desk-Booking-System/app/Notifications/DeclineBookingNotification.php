<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use SebastianBergmann\Timer\Timer;
use Seld\PharUtils\Timestamps;
use App\Models\Bookings;
use Carbon\Carbon;

class DeclineBookingNotification extends Notification
{
    use Queueable;
    protected $role;
    /**
     * Create a new notification instance.
     */
    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $bookings = Bookings::all();

        foreach ($bookings as $booking) {
            $bookingDate = Carbon::parse($booking->booking_date)->format('F j, Y');
            $deskNumber = $booking->desk->desk_num;
            $floor = $booking->desk_id <= 36 ? 1 : 2;
            $time = $booking->booking_time;
            $message = "Unfortunately, your booking has been rejected\n" .
                    "Booking Date: $bookingDate\n" .
                    "Time: $time\n" .
                    "Desk Number: $deskNumber\n" .
                    "Floor: $floor";
        }

        return [
            'role' =>  $this->role,
            'title' => 'Desk Reservation Rejection',
            'message' =>  $message,
            'date_created' => now(),
        ];
    }
}
