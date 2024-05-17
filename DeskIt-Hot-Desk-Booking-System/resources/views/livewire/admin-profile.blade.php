<div class="rounded-lg">

    <div class="flex justify-center items-center mt-2">
    
        <div class="flex flex-row justify-center items-center mt-4 bg-white ml-16 mb-10 w-[80%]"
            style="border:1px solid rgba(128, 128, 128, 0.2);">
            <div class="self-start w-full p-2">

                {{-- Primary TABS --}}
                <div class="flex" style=" border-bottom: 1px solid rgba(128, 128, 128, 0.2);">

                    {{-- Account Settings --}}
                    <div class="px-2 mt-2">
                        <h2 wire:click="setActiveSection(1)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 1 ? 'active-section' : '' }}">
                            Account Settings</h2>
                    </div>

                    {{-- Manage Users --}}
                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(2)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 2 ? 'active-section' : '' }}">
                            Manage Users</h2>
                    </div>

                </div>

                {{-- Account Settings SECONDARY TABS --}}

                @if($activeSection === 1)
                
                <div class="flex flex-row">
                    <div class="flex flex-col m-10">
                        <div class="flex self-center rounded-xl pt-2 px-2 w-60 {{ $activeSecondaryTabAS == 1 ? 'active-secondaryTabAS' : '' }}"
                            style="border:1px solid rgba(128, 128, 128, 0.9);">
                            <h2 wire:click="setActiveAS(1)" class="text-lg cursor-pointer ">
                                Profile Information <i class="fa-solid fa-chevron-right pl-10"></i></h2>
                        </div>

                        <div class="flex self-center rounded-xl mt-2 pt-2 px-2 w-60  {{ $activeSecondaryTabAS == 2 ? 'active-secondaryTabAS' : '' }}"
                            style="border:1px solid rgba(128, 128, 128, 0.9);">
                            <h2 wire:click="setActiveAS(2)" class=" text-lg cursor-pointer">
                                Manage Password <i class="fa-solid fa-chevron-right pl-10"></i></h2>
                        </div>
                    </div>

                    <div>
                        @if($activeSecondaryTabAS === 1)
                        <div>
                            @include('admin.profileEdit')
                        </div>
                        
                        @elseif($activeSecondaryTabAS === 2)
                        <div class="p-4 sm:p-8 bg-white sm:rounded-lg ml-10">
                            <div class="max-w-xl ">
                                @include('profile.partials.update-password-form')
                            </div>
                            
                            @endif
                        </div>
                    </div>

                {{-- Manage Users SECONDARY Taabs --}}
                @elseif($activeSection === 2)
                
                    <div class="flex flex-row mt-2">

                        {{-- ADMINS TAB --}}
                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                        <div class="px-4  mt-2">
                            <h2 wire:click="setActiveMU('admins')"
                                class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSecondaryTabMU == 'admins' ? 'active-section' : '' }}">
                                ADMINS</h2>
                        </div>
                        
                        {{-- OFFICE MANAGERS TAB --}}
                        <div class="px-4  mt-2">
                            <h2 wire:click="setActiveMU('oms')"
                                class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSecondaryTabMU == 'oms' ? 'active-section' : '' }}">
                                OFFICE MANAGERS</h2>
                        </div>
    
                        @endif

                        {{-- EMPLOYEES TAB --}}
                        <div class="px-4  mt-2">
                            <h2 wire:click="setActiveMU('emps')"
                                class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSecondaryTabMU == 'emps' ? 'active-section' : '' }}">
                                EMPLOYEES</h2>
                        </div>
    
                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                        {{-- INACTIVE/PENDING USERS TAB--}}
                        <div class="px-4  mt-2">
                            <h2 wire:click="setActiveMU('pendings')"
                                class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSecondaryTabMU == 'pendings' ? 'active-section' : '' }}">
                                INACTIVE/PENDING USERS</h2>
                        </div>
                        @endif

                    </div>

                {{-- SECONDARY TABS --}}
                <div class="flex justify-center items-center mt-3 p-3 text-sm">
    
                    {{-- Admins --}}
                    @if($activeSecondaryTabMU == 'admins')
                    <table class="w-full justify-center items-center text-center bg-gray">
                        <thead >
                            <tr class="border-1 border-black bg-grey">

                                @if(Auth::user()->hasRole('admin'))
                                    <th class="py-2 w-[5%]">ID</th>
                                    <th class="py-2 w-[30%]">Name</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Gender</th>
                                    <th class="py-2">Birthday</th>
                                @endif

                                @if(Auth::user()->hasRole('superadmin'))
                                    <th class="py-2 w-[5%]">ID</th>
                                    <th class="py-2 w-48">Name</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Gender</th>
                                    <th class="py-2">Birthday</th>
                                    <th class="py-2">Change Role</th>
                                    <th class="py-2">Action</th>    
                                @endif
                            </tr>
                        </thead>

                        {{-- ADMIN TABLE --}}
                        @foreach($users as $user)
                        <tbody class="border-solid border-medgrey border-1">
                            <tr>
                                @if(Auth::user()->hasRole('admin'))
                                    <td class="p-2">{{ $user->id }}</td>
                                    <td class="p-2 px-4 max-w-36 truncate ...">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2">{{ $user->gender }}</td>
                                    <td class="p-2">{{ $user->birthday }}</td>
                                @endif
                                
                                @if(Auth::user()->hasRole('superadmin'))

                                    <td class="p-2">{{ $user->id }}</td>
                                    <td class="p-2 max-w-48 truncate ...">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2">{{ $user->gender }}</td>
                                    <td class="p-2">{{ $user->birthday }}</td>

                                {{-- Change Role--}}

                                    {{-- Make Emp Modal --}}
                                    <x-modal name="makeEmp-modal" title="Change to Employee">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($makeEmpId)
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center truncate ...">User: {{$makeEmpId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeEmp"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Make Employee
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Make OM Modal --}}
                                    <x-modal name="makeOM-modal" title="Change to Office Manager">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($makeOMId)
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center truncate ...">User: {{$makeOMId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeOM"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Make Office Mgr.
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                <td class="p-2 flex justify-content-around">

                                    {{-- Make Employee Open --}}
                                    <button class=' bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                            wire:click="saveEmpId({{ $user->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeEmp-modal'})">
                                        <img src="{{ asset('images/employee_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Employee</span>
                                    </button>

                                    {{-- Make OM Open --}}
                                    <button class=' bg-yellowLight px-2.5 rounded-2xl flex items-center cursor-pointer'
                                            wire:click="saveOMId({{ $user->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeOM-modal'})">
                                        <img src="{{ asset('images/omanager_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Office Mgr.</span>
                                    </button>

                                </td>

                                @endif
    
                                {{-- Action --}}
                                @if(Auth::user()->hasRole('superadmin'))
                                <td class="p-2">

                                    {{-- Buttons --}}
                                    <div class="flex justify-content-around">

                                        {{-- Edit Modal Open--}}
                                        <button class=' bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                            <span class="text-blue-800 text-sm font-thin pl-2">Edit</span>
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user->id }})"
                                                class="bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                >
                                            <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                            <span class="text-slate-600 text-sm font-thin pl-2">Deactivate</span>
                                        </button>

                                        {{-- Delete Modal Open--}}
                                        <button class='bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                wire:click="saveDeleteId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                            <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                        </button>
          
                                    </div>

                                    {{-- Edit Modal --}}
                                    <x-modal name="edit-modal" title="Edit User">
                                        <x-slot:body>
                                            <div class='flex justify-center rounded-3 w-[100%] h-[100%]'>
                                                @if($editUserId)
                                                <form method="post" action="{{route('profile.update')}}"
                                                      class="flex flex-column justify-evenly w-[85%]"
                                                      wire:submit="editProfileSave">
                                                    @csrf
                                                    @method('patch')
                                                    
                                                    {{-- Row 1 --}}
                                                    <div class="flex flex-row justify-content-evenly">

                                                        {{-- Name --}}
                                                        <div class="flex flex-column">
                                                            <label class="self-start ml-3" for="name"> Name:</label>
                                                            <input type="text" name="name" value='' placeholder="{{ $editUserId->name }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                wire:model.live='editName'/>
                                                        </div>

                                                        {{-- Email --}}
                                                        <div class="flex flex-column ">
                                                            <label class="self-start ml-3" for="email"> Email:</label>
                                                            <input type="email" name="email" value='' placeholder="{{ $editUserId->email }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1 "
                                                                wire:model.live='editEmail'/>
                                                        </div>
                                                    </div>

                                                    {{-- Row 2 --}}
                                                    <div class="flex flex-row justify-content-evenly mt-3">
                                                        
                                                        {{-- Gender --}}
                                                        <div class="flex flex-column">
                                                            <label class="self-start ml-3" for="name"> Gender:</label>
                                                            <select class="border-2 border-black border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
                                                            wire:model.live="editGender">

                                                                @if($editUserId->gender === 'male')
                                                                <option value='' selected>male</option>
                                                                <option value="female">female</option>
                                                                
                                                                @elseif($editUserId->gender === 'female')
                                                                <option value='' selected>female</option>
                                                                <option value="male">male</option>
                                                            
                                                                @endif
                                                            </select>
                                                        </div>
                                                        

                                                        {{-- Birthday --}}
                                                        <div class="flex flex-column ">
                                                            <label class="self-start ml-3" for="birthday"> Birthday:</label>
                                                            <input type="date" name="birthday" value='' placeholder="{{ $editUserId->birthday }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                wire:model.live='editBirthday'/>
                                                        </div>
                                                    </div>

                                                    {{-- Save Button --}}
                                                    <div class="flex justify-center items-center mt-3">
                                                        <button x-on:click="$dispatch('close-modal')"
                                                                type="submit"
                                                                class="border-solid border-blue-400 border-1 bg-blue-300 rounded-xl px-4 py-2 font-medium text-xl text-blue-50"
                                                                >Save
                                                        </button>
                                                    </div>

                                                </form>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Deact Modal --}}
                                    <x-modal name="deact-modal" title="Deactivate User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($deactUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$deactUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-slate-300 border-1 bg-slate-300 px-4 py-2 rounded-4 font-medium text-lg text-white"
                                                            wire:click="deactUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Deactivate
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Delete Modal --}}
                                    <x-modal name="delete-modal" title="Delete User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($deleteUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$deleteUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                                                            wire:click="deleteUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Delete
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>


                                    {{-- Ellipsis Icon --}}
                                    {{-- <div x-data="{ isOpen: false }">
                                        <a @click="isOpen = true"
                                            style="cursor: pointer; display: flex; justify-content: center;">
                                            <img src="{{ asset('images/dots.svg') }}" class="h-4 w-4 relative">
                                        </a>

                                        <div x-show="isOpen" @click.away="isOpen = false"
                                            class="showDots flex absolute h-44 w-64 right-8 z-50">

                                            <div
                                                class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>

                                                <div wire:click="showModalAddAsUser({{ $user->id }})"
                                                    class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/user.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as a User</p>
                                                </div>
                                                <div class='flex cursor-pointer'
                                                    wire:click="showModalAddAsOM({{ $user->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Office Manager</p>
                                                </div>

                                                <div class='flex cursor-pointer'
                                                    wire:click="deactModal({{ $user->id }})">
                                                    <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Deact Admin</p>
                                                </div>
                                                

                                                {{-- Open Modal Button--}}
                                                {{-- <div class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <button x-data
                                                        x-on:click="$dispatch('open-modal', {name: 'edit-modal'})"
                                                        class="pl-2" wire:click="openEditProfile({{ $user->id }})">Edit
                                                        User</button>
                                                </div> --}}



                                                {{-- <div wire:click="openEditProfile({{ $user->id }})"
                                                    class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2 "> Edit Details</p>
                                                </div> --}}
 
                                </td>
                                @endif

                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{-- Office manager --}}
                    @elseif($activeSecondaryTabMU  === 'oms')
                    <table class="w-full justify-center items-center text-center bg-gray">
                        <thead>
                            <tr class="border-1 border-black bg-grey">
                                <th class="py-2 w-[5%]">ID</th>
                                <th class="py-2 w-48">Name</th>
                                <th class="py-2">Email</th>
                                <th class="py-2">Gender</th>
                                <th class="py-2">Birthday</th>
                                <th class="py-2">Change Role</th>
                                <th class="py-2">Action</th>
                            </tr>
                        </thead>

                        {{-- OM TABLE --}}
                        @foreach($users4 as $user4)
                        <tbody class="border-solid border-medgrey border-1">
                            <tr>
                                <td class="p-2">{{ $user4->id }}</td>
                                <td class="p-2 max-w-48 truncate ...">{{ $user4->name }}</td>
                                <td class="p-2">{{ $user4->email }}</td>
                                <td class="p-2">{{ $user4->gender }}</td>
                                <td class="p-2">{{ $user4->birthday }}</td>

                                {{-- Change Role --}}

                                <td class="p-2 flex justify-content-around">

                                    {{-- Make Employee Open --}}
                                    <button class=' bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                            wire:click="saveEmpId({{ $user4->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeEmp-modal'})">
                                        <img src="{{ asset('images/employee_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Employee</span>
                                    </button>

                                    @if(Auth::user()->hasRole('superadmin'))

                                    {{-- Make Admin Open --}}
                                    <button class=' bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                            wire:click="saveAdminId({{ $user4->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeAdmin-modal'})">
                                        <img src="{{ asset('images/admin.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Admin</span>
                                    </button>

                                    {{-- Make Admin Modal --}}
                                    <x-modal name="makeAdmin-modal" title="Change to Admin">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($makeAdminId)
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center truncate ...">User: {{$makeAdminId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeAdmin"
                                                            x-on:click="$dispatch('close-modal')">
                                                            
                                                        Make Admin
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>
                                    
                                    @endif

                                    {{-- Make Emp Modal --}}
                                    <x-modal name="makeEmp-modal" title="Change to Employee">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($makeEmpId)
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center truncate ...">User: {{$makeEmpId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeEmp"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Make Employee
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>
                                    


                                </td>

                                

                                {{-- Action --}}
                                <td class="p-2">

                                    {{-- Buttons --}}
                                    <div class="flex justify-content-around">

                                        {{-- Edit Modal Open--}}
                                        <button class=' bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user4->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                            <span class="text-blue-800 text-sm font-thin pl-2">Edit</span>
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user4->id }})"
                                                class="bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                >
                                            <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                            <span class="text-slate-600 text-sm font-thin pl-2">Deactivate</span>
                                        </button>

                                        {{-- Delete Modal Open--}}
                                        <button class='bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                wire:click="saveDeleteId({{ $user4->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                            <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                        </button>
          
                                    </div>

                                    {{-- Edit Modal --}}
                                    <x-modal name="edit-modal" title="Edit User">
                                        <x-slot:body>
                                            <div class='flex justify-center rounded-3 w-[100%] h-[100%]'>
                                                @if($editUserId)
                                                <form method="post" action="{{route('profile.update')}}"
                                                      class="flex flex-column justify-evenly w-[85%]"
                                                      wire:submit="editProfileSave">
                                                    @csrf
                                                    @method('patch')
                                                    
                                                    {{-- Row 1 --}}
                                                    <div class="flex flex-row justify-content-evenly">

                                                        {{-- Name --}}
                                                        <div class="flex flex-column">
                                                            <label class="self-start ml-3" for="name"> Name:</label>
                                                            <input type="text" name="name" value='' placeholder="{{ $editUserId->name }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                wire:model.live='editName'/>
                                                        </div>

                                                        {{-- Email --}}
                                                        <div class="flex flex-column ">
                                                            <label class="self-start ml-3" for="email"> Email:</label>
                                                            <input type="email" name="email" value='' placeholder="{{ $editUserId->email }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1 "
                                                                wire:model.live='editEmail'/>
                                                        </div>
                                                    </div>

                                                    {{-- Row 2 --}}
                                                    <div class="flex flex-row justify-content-evenly mt-3">
                                                        
                                                        {{-- Gender --}}
                                                        <div class="flex flex-column">
                                                            <label class="self-start ml-3" for="name"> Gender:</label>
                                                            <select class="border-2 border-black border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
                                                            wire:model.live="editGender">

                                                                @if($editUserId->gender === 'male')
                                                                <option value='' selected>male</option>
                                                                <option value="female">female</option>
                                                                
                                                                @elseif($editUserId->gender === 'female')
                                                                <option value='' selected>female</option>
                                                                <option value="male">male</option>
                                                            
                                                                @endif
                                                            </select>
                                                        </div>
                                                        

                                                        {{-- Birthday --}}
                                                        <div class="flex flex-column ">
                                                            <label class="self-start ml-3" for="birthday"> Birthday:</label>
                                                            <input type="date" name="birthday" value='' placeholder="{{ $editUserId->birthday }}"
                                                                class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                wire:model.live='editBirthday'/>
                                                        </div>
                                                    </div>

                                                    {{-- Save Button --}}
                                                    <div class="flex justify-center items-center mt-3">
                                                        <button x-on:click="$dispatch('close-modal')"
                                                                wire:submit wire:click='editProfileSave'
                                                                class="border-solid border-blue-400 border-1 bg-blue-300 rounded-xl px-4 py-2 font-medium text-xl text-blue-50"
                                                                >Save
                                                        </button>
                                                    </div>

                                                </form>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Deact Modal --}}
                                    <x-modal name="deact-modal" title="Deactivate User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($deactUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$deactUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-slate-300 border-1 bg-slate-300 px-4 py-2 rounded-4 font-medium text-lg text-white"
                                                            wire:click="deactUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Deactivate
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Delete Modal --}}
                                    <x-modal name="delete-modal" title="Delete User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($deleteUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$deleteUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                                                            wire:click="deleteUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Delete
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{-- Employees--}}
                    @elseif($activeSecondaryTabMU === 'emps')
                    <table class="w-full justify-center items-center text-center bg-gray">
                        <thead >
                            <tr class="border-1 border-black bg-grey">
                                @if(Auth::user()->hasRole('officemanager'))
                                    <th class="py-2 w-[5%]">ID</th>
                                    <th class="py-2 w-[30%]">Name</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Gender</th>
                                    <th class="py-2">Birthday</th>
                                @endif
                                
                                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                                    <th class="py-2 w-[5%]">ID</th>
                                    <th class="py-2 w-48">Name</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Gender</th>
                                    <th class="py-2">Birthday</th>
                                    <th class="py-2">Change Role</th>
                                    <th class="py-2">Action</th>
                                @endif
                            </tr>
                        </thead>

                        {{-- EMPLOYEE TABLE --}}
                        @foreach($users2 as $user2)
                        <tbody class="border-solid border-medgrey border-1">
                            <tr>
                                
                                <td class="p-2">{{ $user2->id }}</td>
                                <td class="p-2 max-w-48 truncate ...">{{ $user2->name }}</td>
                                <td class="p-2">{{ $user2->email }}</td>
                                <td class="p-2">{{ $user2->gender }}</td>
                                <td class="p-2">{{ $user2->birthday }}</td>

                                {{-- Change Role --}}
                                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                                    <td class="p-2 flex justify-content-around">

                                        {{-- Make OM Open --}}
                                        <button class=' bg-yellowLight px-2.5 py-1.5 rounded-2xl flex items-center cursor-pointer'
                                                wire:click="saveOMId({{ $user2->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'makeOM-modal'})">
                                            <img src="{{ asset('images/omanager_new.svg') }}" class="h-6">
                                            <span class="text-yellowBdarker text-sm font-medium pl-2">Office Mgr.</span>
                                        </button>

                                        @if(Auth::user()->hasRole('superadmin'))
                                        {{-- Make Admin Open --}}
                                        <button class=' bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveAdminId({{ $user2->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'makeAdmin-modal'})">
                                            <img src="{{ asset('images/admin.svg') }}" class="h-6">
                                            <span class="text-yellowBdarker text-sm font-medium pl-2">Admin</span>
                                        </button>

                                        {{-- Make Admin Modal --}}
                                        <x-modal name="makeAdmin-modal" title="Change to Admin">
                                            <x-slot:body>
                                                <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                    @if($makeAdminId)
                                                    <div class='flex justify-center'>
                                                        <p class="text-lg text-center truncate ...">User: {{$makeAdminId->name}}</p>
                                                    </div>
                                            
                                                    <div class="flex justify-center mt-3">
                                                        <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                                wire:click="makeAdmin"
                                                                x-on:click="$dispatch('close-modal')">
                                                            Make Admin
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </x-slot:body>
                                        </x-modal>

                                        @endif

                                        {{-- Make OM Modal --}}
                                        <x-modal name="makeOM-modal" title="Change to Office Manager">
                                            <x-slot:body>
                                                <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                    @if($makeOMId)
                                                    <div class='flex justify-center'>
                                                        <p class="text-lg text-center truncate ...">User: {{$makeOMId->name}}</p>
                                                    </div>
                                            
                                                    <div class="flex justify-center mt-3">
                                                        <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                                wire:click="makeOM"
                                                                x-on:click="$dispatch('close-modal')">
                                                            Make Office Mgr.
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </x-slot:body>
                                        </x-modal>

                                    </td>
                                
                                

                                    {{-- Action --}}
                                    <td class="p-2">

                                        {{-- Buttons --}}
                                        <div class="flex justify-content-around">

                                            {{-- Edit Modal Open--}}
                                            <button class=' bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                    wire:click="saveEditId({{ $user2->id }})"
                                                    x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                                <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                                <span class="text-blue-800 text-sm font-thin pl-2">Edit</span>
                                            </button>
        
                                            {{-- Deact Modal Open--}}
                                            <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                    wire:click="saveDeactId({{ $user2->id }})"
                                                    class="bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                    >
                                                <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                                <span class="text-slate-600 text-sm font-thin pl-2">Deactivate</span>
                                            </button>

                                            {{-- Delete Modal Open--}}
                                            <button class='bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                    wire:click="saveDeleteId({{ $user2->id }})"
                                                    x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                                <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                            </button>
            
                                        </div>

                                        {{-- Edit Modal --}}
                                        <x-modal name="edit-modal" title="Edit User">
                                            <x-slot:body>
                                                <div class='flex justify-center rounded-3 w-[100%] h-[100%]'>
                                                    @if($editUserId)
                                                    <form method="post" action="{{route('profile.update')}}"
                                                        class="flex flex-column justify-evenly w-[85%]"
                                                        wire:submit="editProfileSave">
                                                        @csrf
                                                        @method('patch')
                                                        
                                                        {{-- Row 1 --}}
                                                        <div class="flex flex-row justify-content-evenly">

                                                            {{-- Name --}}
                                                            <div class="flex flex-column">
                                                                <label class="self-start ml-3" for="name"> Name:</label>
                                                                <input type="text" name="name" value='' placeholder="{{ $editUserId->name }}"
                                                                    class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                    wire:model.live='editName'/>
                                                            </div>

                                                            {{-- Email --}}
                                                            <div class="flex flex-column ">
                                                                <label class="self-start ml-3" for="email"> Email:</label>
                                                                <input type="email" name="email" value='' placeholder="{{ $editUserId->email }}"
                                                                    class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1 "
                                                                    wire:model.live='editEmail'/>
                                                            </div>
                                                        </div>

                                                        {{-- Row 2 --}}
                                                        <div class="flex flex-row justify-content-evenly mt-3">
                                                            
                                                            {{-- Gender --}}
                                                            <div class="flex flex-column">
                                                                <label class="self-start ml-3" for="name"> Gender:</label>
                                                                <select class="border-2 border-black border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
                                                                wire:model.live="editGender">

                                                                    @if($editUserId->gender === 'male')
                                                                    <option value='' selected>male</option>
                                                                    <option value="female">female</option>
                                                                    
                                                                    @elseif($editUserId->gender === 'female')
                                                                    <option value='' selected>female</option>
                                                                    <option value="male">male</option>
                                                                
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            

                                                            {{-- Birthday --}}
                                                            <div class="flex flex-column ">
                                                                <label class="self-start ml-3" for="birthday"> Birthday:</label>
                                                                <input type="date" name="birthday" value='' placeholder="{{ $editUserId->birthday }}"
                                                                    class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                    wire:model.live='editBirthday'/>
                                                            </div>
                                                        </div>

                                                        {{-- Save Button --}}
                                                        <div class="flex justify-center items-center mt-3">
                                                            <button x-on:click="$dispatch('close-modal')"
                                                                    wire:submit wire:click='editProfileSave'
                                                                    class="border-solid border-blue-400 border-1 bg-blue-300 rounded-xl px-4 py-2 font-medium text-xl text-blue-50"
                                                                    >Save
                                                            </button>
                                                        </div>

                                                    </form>
                                                    @endif
                                                </div>
                                            </x-slot:body>
                                        </x-modal>

                                        {{-- Deact Modal --}}
                                        <x-modal name="deact-modal" title="Deactivate User">
                                            <x-slot:body>
                                                <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                    @if($deactUserId)
                                                    <div class='flex flex-column justify-center'>
                                                        <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                        <p class="text-lg text-center truncate ...">User: {{$deactUserId->name}}</p>
                                                    </div>
                                            
                                                    <div class="flex justify-center mt-3">
                                                        <button class="flex items-center border-solid border-slate-300 border-1 bg-slate-300 px-4 py-2 rounded-4 font-medium text-lg text-white"
                                                                wire:click="deactUser"
                                                                x-on:click="$dispatch('close-modal')">
                                                            Deactivate
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </x-slot:body>
                                        </x-modal>

                                        {{-- Delete Modal --}}
                                        <x-modal name="delete-modal" title="Delete User">
                                            <x-slot:body>
                                                <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                    @if($deleteUserId)
                                                    <div class='flex flex-column justify-center'>
                                                        <p class="text-lg text-center">Are you sure you want to DEACTIVATE</p>
                                                        <p class="text-lg text-center truncate ...">User: {{$deleteUserId->name}}</p>
                                                    </div>
                                            
                                                    <div class="flex justify-center mt-3">
                                                        <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                                                                wire:click="deleteUser"
                                                                x-on:click="$dispatch('close-modal')">
                                                            Delete
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </x-slot:body>
                                        </x-modal>

                                    </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>


                    {{-- Inactive/Pending Users --}}
                    @elseif($activeSecondaryTabMU  === 'pendings')
                    <table class="w-3/4 justify-center items-center text-center bg-gray">
                        <thead>
                            <tr class="border-1 border-black bg-grey">
                                <th class="py-2 w-[10%]">ID</th>
                                <th class="py-2 w-64">Name</th>
                                <th class="py-2">Email</th>
                                <th class="py-2 w-[20%]">Action</th>
                            </tr>
                        </thead>

                        @foreach($users3 as $user3)
                        <tbody>

                            <tr>
                                <td class="p-2">{{ $user3->id }}</td>
                                <td class="p-2 max-w-64 truncate ...">{{ $user3->name }}</td>
                                <td class="p-2">{{ $user3->email }}</td>

                                {{-- Action --}}
                                <td class="p-2 w-full flex justify-content-around">

                                    {{-- Activate Modal Open --}}
                                    <button class=' bg-green-200 px-2.5 rounded-2xl py-2 flex items-center cursor-pointer'
                                            wire:click="saveActivateId({{ $user3->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'activate-modal'})">
                                        <img src="{{ asset('images/activate.svg') }}" class="h-5">
                                        <span class="text-green-800 text-sm font-medium pl-2">Activate</span>
                                    </button>

                                    {{-- Delete Modal Open--}}
                                    <button class='bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                            wire:click="saveDeleteId({{ $user3->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                        <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                    </button>

                                    {{-- Accept Modal --}}
                                    <x-modal name="activate-modal" title="Activate User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($activateUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to ACTIVATE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$activateUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-green-500 border-1 bg-green-300 px-4 py-2 rounded-4 font-semibold text-lg text-green-50"
                                                            wire:click="activateUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Activate
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- Delete Modal --}}
                                    <x-modal name="delete-modal" title="Delete User">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($deleteUserId)
                                                <div class='flex flex-column justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DELETE</p>
                                                    <p class="text-lg text-center truncate ...">User: {{$deleteUserId->name}}</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                                                            wire:click="deleteUser"
                                                            x-on:click="$dispatch('close-modal')">
                                                        Delete
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- <a wire:click="openModal2({{ $user3->id }})"
                                        style="cursor: pointer; display: flex; justify-content: center; padding-right: 10px">
                                        <img src="{{ asset('images/add.svg') }}" class="h-4 w-4">
                                    </a>

                                    <a wire:click="openModal({{ $user3->id }})"
                                        style="cursor: pointer; display: flex; justify-content: center; padding-left: 10px">
                                        <img src="{{ asset('images/delete.svg') }}" class="h-4 w-4">
                                    </a> --}}

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @endif
                </div>

                @endif

            </div>
        </div>



    </div>

    {{-- @include("admin.modals.manageUser") --}}

    @livewireScripts
    {{-- <script>
        // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
    </script> --}}
</div>