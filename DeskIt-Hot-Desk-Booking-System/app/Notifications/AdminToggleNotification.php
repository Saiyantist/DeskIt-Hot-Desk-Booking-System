<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use SebastianBergmann\Timer\Timer;
use Seld\PharUtils\Timestamps;

class AdminToggleNotification extends Notification
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
        return [
            'role' =>  $this->role,
            'title' => 'Action',
            'message' => 'Reminder: You have a pending booking that needs action.',
            'date_created' => now(),
        ];
    }
}
