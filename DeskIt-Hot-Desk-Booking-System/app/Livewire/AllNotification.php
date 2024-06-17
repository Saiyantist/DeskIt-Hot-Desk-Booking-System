<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\HandlesNotifications;

class AllNotification extends Component
{
    use HandlesNotifications;

    public function mount()
    {
        $this->initializeNotifications();
    }

    public function render()
    {
        return view('livewire.all-notification', [
            'notifications' => $this->notifications,
            'unreadCount' => $this->unreadCount,
            'showNotifications' => $this->showNotifications,
        ]);
    }
}
