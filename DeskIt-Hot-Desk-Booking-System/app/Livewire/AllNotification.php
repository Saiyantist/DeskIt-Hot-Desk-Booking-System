<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AllNotification extends Component
{
    public $notifications;
    public $unreadCount;
    public $showNotifications = true; 

    public function mount()
    {
        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            // For admin or superadmin, fetch notifications with role 'admin' or 'superadmin'
            $this->notifications = $user->notifications()->whereIn('data->role', ['admin', 'superadmin'])->orderBy('created_at', 'desc')->get();
            $this->unreadCount = $user->unreadNotifications()
                                      ->whereIn('data->role', ['admin', 'superadmin'])
                                      ->count();
        } else {
            // For other users (employees), fetch notifications with their role
            $this->notifications = $user->notifications()->where('data->role', 'employee')->orderBy('created_at', 'desc')->get();
            $this->unreadCount = $user->unreadNotifications()
                                      ->where('data->role', 'employee')
                                      ->count();
        }
    
        
    }


    public function markAsRead($notificationId)
    {
        $user = Auth::user();

            $notification = $user->notifications()->find($notificationId);
            if ($notification) {
                $notification->markAsRead();
                $this->mount(); // Refresh notifications
            }
        
    }

    public function markAllAsRead()
    {
        $user = Auth::user();

            $user->unreadNotifications->markAsRead();
            $this->mount();
        
    }

    public function clearAll()
    {
        $user = Auth::user();

            $user->unreadNotifications->markAsRead();
            $this->showNotifications = false; 
            $this->mount();

    }


    public function render()
    {
            return view('livewire.all-notification', [
                
                'notifications' => $this->notifications,
                'unreadCount' => $this->unreadCount,
                'showNotifications' => $this->showNotifications,
            ]);
        
        
    }

    protected $listeners = ['refreshNotifications' => 'loadNotifications'];
}
