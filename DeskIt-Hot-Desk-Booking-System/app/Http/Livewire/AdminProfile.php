<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminProfile extends Component
{   
    public $users;
    public $users2;
    public $showModal = false;
    public $deleteUserId;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $activeSection = 1;
    public function mount()
    {   
            $this->users2 = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

       
            $this->users = User::role('admin')
            ->where('id', '!=', Auth::id()) // Exclude the current authenticated user
            ->get();
       
    }

    public function openModal($userId)
    {
        $this->showModal = true;
        $this->deleteUserId = $userId;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->deleteUserId = null;
    }

    public function deleteUser()
    {
        if ($this->deleteUserId) {
            User::destroy($this->deleteUserId);
            $this->closeModal();
            $this->emit('refreshComponent');

        }
    }

    public function render()
    {
        // Check if $reloadComponent is true and reset it to false
        return view('livewire.admin-profile');
    }
    
    public function setActiveSection($section)
    {
        $this->activeSection = $section;
    }
}
