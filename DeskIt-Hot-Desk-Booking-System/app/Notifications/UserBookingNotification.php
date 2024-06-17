<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
class UserBookingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $booking;
    protected $role;

    public function __construct($booking, $role)
    {
        $this->booking = $booking;
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
        $bookingDate = Carbon::parse($this->booking->booking_date)->format('F j, Y');
        $deskNumber = $this->booking->desk->desk_num;
        $floor = $this->booking->desk_id <= 36 ? 1 : 2;
        $time = $this->booking->booking_time;
        $message = "Hello! Just a reminder that you have an upcoming booking.\n" .
               "Booking Date: $bookingDate\n" .
               "Time: $time\n" .
               "Desk Number: $deskNumber\n" .
               "Floor: $floor";

        return [
            'role' => $this->role,
            'title' => 'Booking Reminder',
            'message' => $message,
            'date_created' => now(),
        ];
    }
}
