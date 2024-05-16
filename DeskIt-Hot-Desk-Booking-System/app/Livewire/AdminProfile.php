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


    /**
     *  Containers for the list of user-type from the Databasea.
     */
    public $users;
    public $users2;
    public $users3;
    public $users4;

    public $showModal2 = false;
    public $showModalAddUser = false;
    public $showDeact = false;


    /**
     * Wire model containers used for data manipulation.
     */

    // Change User Role
    public $makeAdminId;
    public $makeOMId;
    public $makeEmpId;

    // Edit User
    public $editUserId;
    public $editName;
    public $editEmail;
    public $editGender;
    public $editBirthday;
    public $editPhone;
    public $editPosition;

    // Deactivate User
    public $deactUserId;

    // Delete User
    public $deleteUserId;

    // Accept User
    public $activateUserId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $position;
    public $role;


    public $activeSection = 1;
    public $activeSecondaryTabAS = 1;
    public $activeSecondaryTabMU;
    // public $activeSecondaryTabMU = 'emps';

    public $editMode = false;

    // profile edit
    public $name;
    public $email;
    public $gender;
    public $birthday;


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
                
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->gender = Auth::user()->gender;
            $this->birthday = Auth::user()->birthday;

       
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

    // ================== Role CHANGING ==================

    /**
     *  MAKE EMPLOYEE
     */
    public function makeEmp()
    {
        if ($this->makeEmpId) {
            $user = User::find($this->makeEmpId)->first();
            $user->roles()->detach();
            $user->assignRole('employee');
            $this->resetEditData();

            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
        }
    }
    public function saveEmpId($userId)
    {
        $this->makeEmpId = User::find($userId);
    }

    /**
     *  MAKE OFFICE MANAGER
     */
    public function makeOM()
    {
        if ($this->makeOMId) {
            $user = User::find($this->makeOMId)->first();
            $user->roles()->detach();
            $user->assignRole('officemanager');
            $this->resetEditData();
            
            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
        }
    }
    public function saveOMId($userId)
    {
        $this->activeSection = 2;
        $this->makeOMId = User::find($userId);
        // dd(User::find($this->makeOMId)->first()->name);
    }

    /**
     *  MAKE ADMIN
     */
    public function makeAdmin()
    {
        if ($this->makeAdminId) {
            $user = User::find($this->makeAdminId)->first();
            $user->roles()->detach();
            $user->assignRole('Admin');
            $this->resetEditData();
            
            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
        }
    }

    public function saveAdminId($userId)
    {
        $this->activeSection = 2;
        $this->makeAdminId = User::find($userId);
        // dd(User::find($this->makeAdminId)->first()->name);
    }

    // ================== USER MANAGE ==================

    /**
     *  EDIT USER
     */
    public function saveEditId($userId)  
    {
        $this->editUserId = User::find($userId);
    }

    public function editProfileSave()
    {
        $user = $this->editUserId;
        if($this->editName){
            $user->update(['name' => $this->editName ,]);
        }

        if($this->editEmail){
            $user->update(['email' => $this->editEmail ,]);
        }

        if($this->editGender){
            $user->update(['gender' => $this->editGender,]);
        }

        if($this->editBirthday){
            $user->update(['birthday' => $this->editBirthday,]);
        }
        if($this->editPhone){
            $user->update(['phone' => $this->editPhone,]);
        }
        if($this->editPosition){
            $user->update(['Position' => $this->editPosition,]);
        }


        $this->resetEditData();
        // $this->redirect(request()->header('Referer'));
    }

    /**
     *  DEACTIVATE USER
     */
    public function deactUser()
    {
        if ($this->deactUserId) {
            $user = User::find($this->deactUserId);
            $user->first()->roles()->detach();
            $this->resetEditData();

            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
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
            $this->resetEditData();
            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
        }
    }

    /**
     *  ACCEPT USER
     */
    public function activateUser()
    {
        if ($this->activateUserId) {
            $user = User::find($this->activateUserId)->first();
            $user->roles()->detach();
            $user->assignRole('employee');
            $this->resetEditData();

            $this->dispatch('refreshComponent');
            // $this->redirect(request()->header('Referer'));
        }
    }
    
    public function saveActivateId($userId)
    {
        // $this->showModal2 = true;
        $this->activateUserId = User::find($userId);
    }
    
    public function resetEditData() {
        $this->reset(
            'editUserId',
            'editName',
            'editEmail',
            'editGender',
            'editBirthday',
            'deleteUserId',
            'activateUserId',
            'deactUserId',
            'makeEmpId',
            'makeOMId',
            'makeAdminId',
        );

        $this->mount();
    }

    public function toggleEditMode()
    {   
        $this->editMode = true;
    }

    //save profile
    public function editProfile()
{
    $user = Auth::user();

    if ($user) {
        // Update user's name and email
        $user->name = $this->name;
        $user->email = $this->email;
        $user->gender = $this->gender;
        $user->birthday = $this->birthday;
        $user->save();

    }

    $this->editMode = false;
    
    $this->redirect(request()->header('Referer'));
    
    
}


    public function render()
    {
        return view('livewire.admin-profile');
    }
    
    public function setActiveSection($section)
    {
        
        $this->activeSection = $section;

        if($section === 2){
            $this->activeSecondaryTabMU = 'admins';
        }
        
        if($section === 1){
            $this->reset('activeSecondaryTabAS', 'activeSection');
        }
    }
    public function setActiveAS($accountSet)
    {
        $this->activeSecondaryTabAS = $accountSet;
        
    }

    public function setActiveMU($secondaryTab)
    {
        // $this->activeSection = 2;
        $this->activeSecondaryTabMU = $secondaryTab;
        $this->resetEditData();
        // dd($this->activeSection);
    }
}
