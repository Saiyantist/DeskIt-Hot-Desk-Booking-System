<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Desk;
use Illuminate\Support\Facades\Auth;
use App\Models\Issue;

class Support extends Component
{
    public $subject;
    public $description;
    public $type;
    public $status;
    public $deskNumber;
    public $successMessage = '';
    public $showModal = false;
    public function submitForm()
    {
        $validated = $this->validate([
            'deskNumber' => 'required|int',
            'subject' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string|max:4000',
        ]);

        $deskId = Desk::where('desk_num', $validated['deskNumber'])->pluck('id');
        
        Issue::create([
            'subject' => $this->subject,
            'description' => $this->description,
            'type' => $this->type,
            'status' => 'to review',
            'user_id'=> Auth::user()->id,
            'desk_id' => $deskId[0],
        ]);

        // Redirect back with a success message
        $this->successMessage = 'Form submitted successfully!';
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.support');
    }
}
