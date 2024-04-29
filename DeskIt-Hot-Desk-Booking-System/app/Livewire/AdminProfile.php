<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Features\SupportFormObjects\Form;

use function PHPUnit\Framework\isNull;

class AdminProfile extends Component
{   
    public $addAsAdminId;
    public $addAsOMId;
    public $addAsUserId;
    public $showModalAddA = false;
    public $showModalAddU = false;
    public $showModalAddOM = false;
    public $showEditProfile = false;
    public $users;
    public $users2;
    public $users3;
    public $users4;
    public $showModal = false;
    public $showModal2 = false;
    public $showModalAddUser = false;
    public $showDeact = false;
    public $editUserId;
    public $editName;
    public $editEmail;
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
                ->orWhere('name', 'officemanager')
                ->orWhere('name', 'superadmin');
            })->get();

            $this->users2 = User::role('employee')
            ->get();


            $this->users = User::role('admin')
            ->where('id', '!=', Auth::id()) // to exclude the current authenticated user
            ->get();
            
            $this->users4 = User::role('officemanager')
            ->where('id', '!=', Auth::id()) 
            ->get();
      
//             $this->users = User::whereHas('roles', function($q){
//               $q->where('name', 'admin')
//               ->orWhere('name', 'superadmin')
//               ->orWhere('name', 'officemanager');
//             })->get();
       
    }

// -------------------------- not used
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

    public function deactUser()
    {

        if ($this->deactUserId) {
            $user = User::find($this->deactUserId);
            
            if($user->hasAnyRole('admin', 'employee', 'officemanager')){
                $user->removeRole('employee');
            }
            
            $this->closeDeactModal();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }

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

    public function openModalAdd()
    {
        $this->showModalAddUser = true;
        // $this->addUser = $userId;
    }

    public function closeModalAdd()
    {
        $this->showModalAddUser = false;
    }

    //accept user from pending/inactive tab
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

    // change access role to user
    public function addAsUser() {
        if ($this->addAsUserId) {
            $user = User::find($this->addAsUserId);
            $user->roles()->detach();
            $user->assignRole('employee');
            
            $this->closeModalAddAsUser();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }
    }
    public function showModalAddAsUser($userId)
    {
        $this->showModalAddU = true;
        $this->addAsUserId = $userId;
    }

    public function closeModalAddAsUser()
    {
        $this->showModalAddU = false;
        $this->addAsUserId = null;
    }


    public function addAsOM() {
        if ($this->addAsOMId) {
            $user = User::find($this->addAsOMId);
            $user->roles()->detach();
            $user->assignRole('officemanager');
            
            $this->closeModalAddAsOM();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }
    }
    public function showModalAddAsOM($userId)
    {
        $this->showModalAddOM  = true;
        $this->addAsOMId = $userId;
    }

    public function closeModalAddAsOM()
    {
        $this->showModalAddOM  = false;
        $this->addAsOMId = null;
    }

    public function addAsAdmin() {
        if ($this->addAsAdminId) {
            $user = User::find($this->addAsAdminId);
            $user->roles()->detach();
            $user->assignRole('Admin');
            
            $this->closeModalAddAsAdmin();
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }
    }
    public function showModalAddAsAdmin($userId)
    {
        $this->showModalAddA  = true;
        $this->addAsAdminId = $userId;
    }

    public function closeModalAddAsAdmin()
    {
        $this->showModalAddA  = false;
        $this->addAsAdminId = null;
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


    public function openEditProfile($userId)  
    {
        $this->editUserId = User::find($userId);
        $this->showEditProfile = true;
    }

    public function closeEditProfile()
    {
        $this->editUserId = null;
        $this->showEditProfile = false;
    }

    public function profileEditSave()
    {
        $user = User::find($this->editUserId)->first();

        if($this->editName){
            $user->update(['name' => $this->editName]);

            // dd('Gumana');
            // $user = User::find($this->editUserId);
            // $user->update(['name' => $this->editName ,]);
        }

        if($this->editEmail){
            $user->update(['email' => $this->editEmail]);
            // $user = User::find($this->editUserId);
            // $user->update(['email' => $this->editEmail ,]);
        }

        $this->redirect(request()->header('Referer'));
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
