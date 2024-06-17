<?php

namespace App\Http\Livewire\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HandlesNotifications
{
    public $notifications;
    public $unreadCount;
    public $showNotifications = true;

    public function initializeNotifications()
    {
        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
            $this->notifications = $user->notifications()
                ->whereIn('data->role', ['admin', 'superadmin'])
                ->orderBy('created_at', 'desc')
                ->get();
            $this->unreadCount = $user->unreadNotifications()
                ->whereIn('data->role', ['admin', 'superadmin'])
                ->count();
        } else {
            $this->notifications = $user->notifications()
                ->where('data->role', 'employee')
                ->orderBy('created_at', 'desc')
                ->get();
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
            $this->initializeNotifications();
        }
    }

    public function markAsUnread($notificationId)
    {
        $user = Auth::user();
        $notification = $user->notifications()->find($notificationId);
        if ($notification) {
            $notification->update(['read_at' => null]);
            $this->initializeNotifications();
        }
    }

    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        $this->initializeNotifications();
    }

    public function clearAll()
    {
        $user = Auth::user();
        $user->unreadNotifications->each->markAsRead();
        $user->notifications()->delete();
        
        // Re-initialize notifications and update state
        $this->initializeNotifications();
    }

    public function updateNotification()
    {
        
        $this->initializeNotifications();
    }
}
