<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotifcationPreferences extends Component
{
    public $bookingRemindersDb;
    public $bookingRemindersEmail;
    public $reservedDeskStatusDb;
    public $reservedDeskStatusEmail;

    public function mount() {
        $user = Auth::user();
        $this->bookingRemindersDb = $user->preferences['booking_reminders_db'] ?? true;
        $this->bookingRemindersEmail = $user->preferences['booking_reminders_email'] ?? true;
        $this->reservedDeskStatusDb = $user->preferences['reserved_desk_status_db'] ?? true;
        $this->reservedDeskStatusEmail = $user->preferences['reserved_desk_status_email'] ?? true;
    }

    public function toggle($type) {
        $user = Auth::user();
        $preferences = $user->preferences;

        switch ($type) {
            case 'booking_reminders_db':
                $this->bookingRemindersDb = !$this->bookingRemindersDb;
                $preferences['booking_reminders_db'] = $this->bookingRemindersDb;
                break;
            case 'booking_reminders_email':
                $this->bookingRemindersEmail = !$this->bookingRemindersEmail;
                $preferences['booking_reminders_email'] = $this->bookingRemindersEmail;
                break;
            case 'reserved_desk_status_db':
                $this->reservedDeskStatusDb = !$this->reservedDeskStatusDb;
                $preferences['reserved_desk_status_db'] = $this->reservedDeskStatusDb;
                break;
            case 'reserved_desk_status_email':
                $this->reservedDeskStatusEmail = !$this->reservedDeskStatusEmail;
                $preferences['reserved_desk_status_email'] = $this->reservedDeskStatusEmail;
                break;
        }

        $user->preferences = $preferences;
        $user->save();
    }
    
    public function render()
    {
        return view('livewire.notifcation-preferences');
    }
}
