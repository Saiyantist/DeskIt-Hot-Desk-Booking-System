<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
// use App\Models\Bookings;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class AdminProfile extends Component
{   
    public $users;
    public $users2;
    public $users3;
    public $showModal = false;
    public $showModal2 = false;
    public $showDeact = false;
    public $deleteUserId;
    public $acceptUserId;
    public $deactUserId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $position;
    public $role;

    public $activeSection = 1;
    public function mount()
    {   
            $this->users3 = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin')
                ->orWhere('name', 'employee')
                ->orWhere('name', 'superadmin')
                ->orWhere('name', 'officemanager');
            })->get();

            $this->users2 = User::role('employee')
            ->get();

            $this->users = User::whereHas('roles', function($q){
                $q->where('name', 'admin')
                ->orWhere('name', 'superadmin')
                ->orWhere('name', 'officemanager');
            })->get();
            // ->where('id', '!=', Auth::id()) // Exclude the current authenticated user
            
       
    }

    public function changePosition($userId)
    {
        $userPosition = User::find($userId);

        if (!$this->position){
            $userPosition->update(['position' => 'Employee']);
        }
        else {
            $userPosition->update(['position' => $this->position]);

        }

        $this->redirect(request()->header('Referer'));
    }

    public function changeRole($userId)
    {
        $user = User::find($userId);

        $this->role;
        $user->roles()->detach();
        $user->assignRole($this->role);
       
        $this->redirect(request()->header('Referer'));

    }


    public function deactModal($userId)
    {
        $this->showDeact = true;
        $this->deactUserId = $userId;
    }

    public function closeDeactModal()
    {
        $this->showDeact = false;
        $this->deactUserId = null;
    }

    public function deactUser()
    {

        if ($this->deactUserId) {
            $user = User::find($this->deactUserId);
            
            if($user->hasAnyRole('admin', 'employee')){
                $user->removeRole('employee');
            }
            
            $this->closeDeactModal();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }

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
