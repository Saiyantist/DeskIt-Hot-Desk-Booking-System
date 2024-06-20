<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotifcationPreferences extends Component
{
    public $reservedDeskStatus;

    public function mount()
    {
        $user = Auth::user();
        $this->reservedDeskStatus = $user->prefersNotification('reserved_desk_status');
    }

    public function toggle()
    {
        $user = Auth::user();
        $this->reservedDeskStatus = !$this->reservedDeskStatus;

        // Assuming preferences are stored in a JSON column
        $preferences = $user->preferences;
        $preferences['reserved_desk_status'] = $this->reservedDeskStatus;
        $user->preferences = $preferences;
        $user->save();
    }
    
    public function render()
    {
        return view('livewire.notifcation-preferences');
    }
}
