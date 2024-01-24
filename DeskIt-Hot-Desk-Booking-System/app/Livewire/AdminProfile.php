<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
// use App\Models\Bookings;
use Illuminate\Support\Facades\Auth;

class AdminProfile extends Component
{   
    public $users;
    public $users2;
    public $users3;
    public $showModal = false;
    public $showModal2 = false;
    public $deleteUserId;
    public $acceptUserId;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $activeSection = 1;
    public function mount()
    {   
            $this->users3 = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin')
                ->orWhere('name', 'employee');
            })->get();

            $this->users2 = User::role('employee')
            ->get();

            $this->users = User::role('admin')
            // ->where('id', '!=', Auth::id()) // Exclude the current authenticated user
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

            // User::statement('SET FOREIGN_KEY_CHECKS=0;');
            User::destroy($this->deleteUserId);
            // User::statement('SET FOREIGN_KEY_CHECKS=1;');
            $this->closeModal();
            $this->dispatch('refreshComponent');

        }
    }

    public function openModal2($userId)
    {
        $this->showModal2 = true;
        $this->acceptUserId = $userId;
    }

    public function closeModal2()
    {
        $this->showModal2 = false;
        $this->acceptUserId = null;
    }
    public function acceptUser()
    {
        if ($this->acceptUserId) {
            $user = User::find($this->acceptUserId);
            $user->assignRole('employee');
            
            $this->closeModal2();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
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
