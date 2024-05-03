<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
// use App\Models\Bookings;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFormObjects\Form;

use function PHPUnit\Framework\isNull;

class AdminProfile extends Component
{   
    public $addAsAdminId;
    public $makeOMId;
    public $makeEmpId;
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
    public $editGender;
    public $editBirthday;
    public $editPhone;
    public $editPosition;
    public $deleteUserId;
    public $acceptUserId;
    public $deactUserId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $position;
    public $role;


    public $activeSection = 3;
    public $activeAccountSet = 1;
    public $editMode = false;


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

        $user->roles()->detach();
        $user->assignRole($this->role);
       
        $this->redirect(request()->header('Referer'));
    }



    /**
     *  MAKE EMPLOYEE
     */
    public function makeEmp() {
        if ($this->makeEmpId) {
            $user = User::find($this->makeEmpId)->first();
            $user->roles()->detach();
            $user->assignRole('employee');
            
            $this->dispatch('refreshComponent');
            $this->redirect(request()->header('Referer'));
        }
    }
    public function saveEmpId($userId)
    {
        $this->makeEmpId = User::find($userId);
    }

    /**
     *  MAKE OFFICE MANAGER
     */
    public function makeOM() {
        if ($this->makeOMId) {
            $user = User::find($this->makeOMId)->first();
            $user->roles()->detach();
            $user->assignRole('officemanager');
            
            $this->dispatch('refreshComponent');

            $this->redirect(request()->header('Referer'));
        }
    }
    public function saveOMId($userId)
    {
        $this->makeOMId = User::find($userId);
    }



    /**
     *  EDIT USER
     */

     public function saveEditId($userId)  
     {
         // $this->showEditProfile = true;
         $this->editUserId = User::find($userId);
 
     }
 
         public function closeEditProfile()
     {
         $this->showEditProfile = false;
         $this->editUserId = null;
     }
 
     public function editProfileSave()
     {
         $user = $this->editUserId;
         if($this->editName){
             $user->update(['name' => $this->editName ,]);
             $this->editName = null;
         }
 
         if($this->editEmail){
             $user->update(['email' => $this->editEmail ,]);
             $this->editEmail = null;
         }
 
         if($this->editGender){
             $user->update(['gender' => $this->editGender,]);
             $this->editGender = null;
         }
 
         if($this->editBirthday){
             $user->update(['birthday' => $this->editBirthday,]);
             $this->editBirthday = null;
         }
         if($this->editPhone){
             $user->update(['phone' => $this->editPhone,]);
             $this->editPhone = null;
         }
         if($this->editPosition){
             $user->update(['Position' => $this->editPosition,]);
             $this->editPosition = null;
         }
 
 
         $this->editUserId = null;
         
         $this->redirect(request()->header('Referer'));
     }

    /**
     *  DEACTIVATE USER
     */
    public function deactUser()
    {
        if ($this->deactUserId) {
            $user = User::find($this->deactUserId);
            $user->first()->roles()->detach();

            $this->dispatch('refreshComponent');
            $this->redirect(request()->header('Referer'));
        }
    }

    public function saveDeactId($userId)
    {
        // $this->showDeact = true;
        $this->deactUserId = User::find($userId);
    }

    /**
     *  DELETE USER
     */
    public function saveDeleteId($userId)  
    {
        // $this->showModal = true;
        $this->deleteUserId = User::find($userId);
    }

    public function deleteUser()
    {
        if ($this->deleteUserId) {
            // dd($this->deleteUserId);

            // User::statement('SET FOREIGN_KEY_CHECKS=0;');

            User::destroy($this->deleteUserId->id);

            // User::statement('SET FOREIGN_KEY_CHECKS=1;');

            // $this->closeModal();
            $this->dispatch('refreshComponent');
            $this->redirect(request()->header('Referer'));
        }

        
    }


    /**
     *  ACCEPT USER
     */

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




    public function openModalAdd()
    {
        $this->showModalAddUser = true;
        // $this->addUser = $userId;
    }

    public function closeModalAdd()
    {
        $this->showModalAddUser = false;
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


    public function resetEditData() {
        $this->reset(
            'editUserId',
            'editName',
            'editEmail',
            'editGender',
            'editBirthday',
            'deleteUserId',
            'acceptUserId',
            'deactUserId',
            'makeEmpId',
            'makeOMId',
        );
    }

    public function toggleEditMode()
    {
        $this->editMode = !$this->editMode;
        // dd($this->editMode);
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
    public function setActiveAS($accountSet)
    {
        
        $this->activeAccountSet = $accountSet;
        
    }
}
