<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\HandlesNotifications;

class Notification extends Component
{
    use HandlesNotifications;

    public function mount()
    {
        $this->initializeNotifications();
    }

    public function render()
    {
        return view('livewire.notification', [
            'notifications' => $this->notifications,
            'unreadCount' => $this->unreadCount,
            'showNotifications' => $this->showNotifications,
        ]);
    }
}
