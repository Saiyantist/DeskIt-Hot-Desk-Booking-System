<div class="rounded-lg">

    <div class="flex justify-center items-center mt-2 ">

        {{-- TAB CHOOSER/PICKER --}}
        <div class="flex flex-row justify-center items-center mt-4 bg-white ml-16"
            style="width: 80%; border:1px solid rgba(128, 128, 128, 0.2);">
            <div class="self-start w-full p-2">
                <div class="flex" style=" border-bottom: 1px solid rgba(128, 128, 128, 0.2);">
                    <div class="px-2 mt-2">
                        <h2 wire:click="setActiveSection(1)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 1 ? 'active-section' : '' }}">
                            Account Settings</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(2)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 2 ? 'active-section' : '' }}">
                            Manage Users</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(3)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 3 ? 'active-section' : '' }}">
                            ADMINS</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(4)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 4 ? 'active-section' : '' }}">
                            OFFICE MANAGERS</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(5)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 5 ? 'active-section' : '' }}">
                            EMPLOYEES</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(6)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 6 ? 'active-section' : '' }}">
                            INACTIVE/PENDING USERS</h2>
                    </div>

                </div>

                @if($activeSection === 1)
                <div class="flex flex-row m-4 ">
                    <div class="flex flex-col">
                        <div class="flex self-center rounded-xl pt-2 px-2 w-60 {{ $activeAccountSet == 1 ? 'active-accountSet' : '' }}"
                            style="border:1px solid rgba(128, 128, 128, 0.9);">
                            <h2 wire:click="setActiveAS(1)" class=" text-lg cursor-pointer ">
                                Profile Information <i class="fa-solid fa-chevron-right pl-10"></i></h2>


                        </div>
                        <div class="flex self-center rounded-xl mt-2 pt-2 px-2 w-60  {{ $activeAccountSet == 2 ? 'active-accountSet' : '' }}"
                            style="border:1px solid rgba(128, 128, 128, 0.9);">
                            <h2 wire:click="setActiveAS(2)" class=" text-lg cursor-pointer">
                                Manage Password <i class="fa-solid fa-chevron-right pl-10"></i></h2>


                        </div>
                    </div>
                    <div class="">
                        @if($activeAccountSet === 1)
                        <div class="ml-10">
                            @include('admin.profileEdit')
                        </div>
                        @elseif($activeAccountSet === 2)
                        <div class="p-4 sm:p-8 bg-white sm:rounded-lg ml-10">
                            <div class="max-w-xl ">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        @endif
                    </div>
                </div>

                @endif

                {{-- TABLES --}}

                <div class="flex justify-center items-center mt-3 p-3 text-sm">
    
                    {{-- Admins --}}
                    @if($activeSection === 3)
                    <table class="w-full justify-center items-center text-center bg-gray">
                        <thead >
                            <tr>
                                <th class=" text-2xl font-medium p-2">ADMINS</th>
                            </tr>
                            <tr class="border-1 border-black">
                                <th class="py-2 bg-grey">ID</th>
                                <th class="py-2 bg-grey">Name</th>
                                <th class="py-2 bg-grey">Email</th>
                                <th class="py-2 bg-grey">Gender</th>
                                <th class="py-2 bg-grey">Birthday</th>
                                <th class="py-2 bg-grey">Change Role</th>
                                <th class="py-2 bg-grey">Action</th>
                            </tr>
                        </thead>

                        @foreach($users as $user)
                        <tbody class="border-solid border-medgrey border-1">
                            <tr>
                                
                                <td class="p-2">{{ $user->id }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->gender }}</td>
                                <td class="p-2">{{ $user->birthday }}</td>

                                {{-- Change Role--}}
                                
                                @if(Auth::user()->hasRole('superadmin'))

                                <td class="p-2 flex justify-content-around">

                                    {{-- Make Employee Open --}}
                                    <button class=' bg-yellowLight px-3 rounded-2xl py-1 flex items-center cursor-pointer'
                                            wire:click="saveEmpId({{ $user->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeEmp-modal'})">
                                        <img src="{{ asset('images/employee_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Employee</span>
                                    </button>

                                    {{-- Make OM Open --}}
                                    <button class=' bg-yellowLight px-3 rounded-2xl py-1 flex items-center cursor-pointer'
                                            wire:click="saveOMId({{ $user->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeOM-modal'})">
                                        <img src="{{ asset('images/omanager_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Office Manager</span>
                                    </button>


                                    {{-- Make Emp Modal --}}
                                    <x-modal name="makeEmp-modal" title="Change to Employee">
                                        <x-slot:body>
                                            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                                                @if($makeEmpId)
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to make {{$makeEmpId->name}} into an EMPLOYEE?</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeEmp">
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
                                                    <p class="text-lg text-center">Are you sure you want to make {{$makeOMId->name}} into an OFFICE MANAGER?</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
                                                            wire:click="makeOM">
                                                        Make O.M.
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </x-slot:body>
                                    </x-modal>

                                    {{-- <div wire:click="showModalAddAsUser({{ $user->id }})" class='border-solid border-yellowB border-2 flex flex-row-reverse cursor-pointer p-2 px-2 rounded-lg mr-3'>
                                        <span class="text-yellowB text-sm font-thin pl-2">Employee</span>
                                        <img src="{{ asset('images/employee.svg') }}" class="h-5 w-5">
                                    </div> --}}

                                    {{-- <div wire:click="showModalAddAsOM({{ $user->id }})" class='border-solid border-yellowB border-2 flex flex-row-reverse cursor-pointer p-2 px-2 rounded-lg ml-3'>
                                        <span class="text-yellowB text-sm font-thin pl-2">Office Manager</span>
                                        <img src="{{ asset('images/omanager_new.svg') }}" class="h-6">
                                    </div> --}}

                                </td>

                                @endif
    
                                {{-- Action --}}
                                <td class="p-2">

                                    {{-- Buttons --}}
                                    <div class="flex justify-content-around">

                                        {{-- Edit Modal Open--}}
                                        <button class=' bg-blue-100 px-3 rounded-2xl py-1 flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                            <span class="text-blue-800 text-sm font-thin pl-2">Edit</span>
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user->id }})"
                                                class="bg-slate-200 ml-1 px-3 rounded-2xl flex items-center cursor-pointer"
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
                                                      class="flex flex-column justify-evenly w-[85%]">
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
                                                        <button x-on:click="show = false"
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
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DEACTIVATE user: {{$deactUserId->name}}?</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-slate-300 border-1 bg-slate-300 px-4 py-2 rounded-4 font-medium text-lg text-white"
                                                            wire:click="deactUser">
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
                                                <div class='flex justify-center'>
                                                    <p class="text-lg text-center">Are you sure you want to DELETE user: {{$deleteUserId->name}}?</p>
                                                </div>
                                        
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                                                            wire:click="deleteUser">
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



                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{-- Office manager --}}
                    @elseif($activeSection=== 4)
                    <table class="w-75 p-10 text-center bg-gray ">
                        <thead>
                            <tr>
                                <th colspan="2" class=" text-2xl font-medium p-2">OFFICE MANAGERS</th>
                            </tr>
                            <tr>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                                <th class=" w-25 px-12 py-2 justify-center items-center bg-grey">Action</th>
                            </tr>
                        </thead>

                        @foreach($users4 as $user4)
                        <tbody>
                            <tr>
                                <td class="p-2">{{ $user4->id }}</td>
                                <td class="p-2">{{ $user4->name }}</td>
                                <td class="p-2">{{ $user4->email }}</td>
                                <td class="p-2">
                                    <div x-data="{ isOpen: false }">
                                        <a @click="isOpen = true"
                                            style="cursor: pointer; display: flex; justify-content: center;">
                                            <img src="{{ asset('images/dots.svg') }}" class="h-4 w-4 relative">
                                        </a>
                                        <div x-show="isOpen" @click.away="isOpen = false"
                                            class="showDots flex absolute h-44 w-64 right-8 z-50 ">

                                            <div
                                                class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>
                                                <div wire:click="showModalAddAsUser({{ $user4->id }})"
                                                    class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/user.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as a User</p>
                                                </div>
                                                <div class='flex cursor-pointer'
                                                    wire:click="showModalAddAsAdmin({{ $user4->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Admin</p>
                                                </div>
                                                <div class='flex cursor-pointer'
                                                    wire:click="openModal({{ $user4->id }})">
                                                    <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Delete Office Manager</p>
                                                </div>
                                                <div wire:click="openEditProfile({{ $user4->id }})"
                                                    class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2 "> Edit Details</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{-- Employees/users --}}
                    @elseif($activeSection=== 5)
                    <table class="w-75 p-10 text-center bg-gray ">
                        <thead>
                            <tr>
                                <th class=" text-2xl font-medium p-2">USERS</th>
                            </tr>
                            <tr>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                                <th class=" w-25 px-12 py-2 justify-center items-center bg-grey">Action</th>
                            </tr>
                        </thead>

                        @foreach($users2 as $user2)
                        <tbody>
                            <tr>
                                <td class="p-2">{{ $user2->id }}</td>
                                <td class="p-2">{{ $user2->name }}</td>
                                <td class="p-2">{{ $user2->email }}</td>
                                <td class="p-2">
                                    <div x-data="{ isOpen: false }">
                                        <a @click="isOpen = true"
                                            style="cursor: pointer; display: flex; justify-content: center;">
                                            <img src="{{ asset('images/dots.svg') }}" class="h-4 w-4 relative">
                                        </a>
                                        <div x-show="isOpen" @click.away="isOpen = false"
                                            class="showDots flex absolute h-44 w-64 right-8 z-50 ">

                                            <div
                                                class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>
                                                <div class='flex cursor-pointer'
                                                    wire:click="showModalAddAsAdmin({{ $user2->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Admin</p>
                                                </div>
                                                <div class='flex cursor-pointer'
                                                    wire:click="showModalAddAsOM({{ $user2->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Office Manager</p>
                                                </div>

                                                <div class='flex cursor-pointer' wire:click="saveDeleteId({{ $user2->id }})">
                                                
                                                    <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Delete User</p>
                                                </div>

                                                {{-- EditModal --}}
                                                <x-modal name="edit-modal" title="Edit User">
                                                    <x-slot:body>
                                                        <div
                                                            class='flex justify-center rounded-3 bg-gray-200 w-[90%] h-[85%] p-2'>
                                                            @if($editUserId)
                                                            <form method="post" action="{{route('profile.update')}}">
                                                                @csrf
                                                                @method('patch')
                                                                {{-- Row 1 --}}
                                                                <div class="flex flex-row justify-content-evenly">

                                                                    {{-- Name --}}
                                                                    <div class="flex flex-column">
                                                                        <label class="self-start ml-3" for="name">
                                                                            Name:</label>
                                                                        <input type="text" name="name" value=''
                                                                            placeholder="{{ $editUserId->name }}"
                                                                            class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                            wire:model.lazy='editName' />
                                                                    </div>

                                                                    {{-- Email --}}
                                                                    <div class="flex flex-column ">
                                                                        <label class="self-start ml-3" for="email">
                                                                            Email:</label>
                                                                        <input type="email" name="email" value=''
                                                                            placeholder="{{ $editUserId->email }}"
                                                                            class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1 "
                                                                            wire:model.lazy='editEmail' />
                                                                    </div>
                                                                </div>

                                                                {{-- Row 2 --}}
                                                                <div class="flex flex-row justify-content-evenly mt-3">

                                                                    {{-- Gender --}}
                                                                    <div class="flex flex-column">
                                                                        <label class="self-start ml-3" for="name">
                                                                            Gender:</label>
                                                                        <select
                                                                            class="border-2 border-black border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
                                                                            wire:model.lazy="editGender">

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
                                                                            wire:model.lazy='editBirthday' />
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <div class="flex justify-center items-center">
                                                                    <button x-on:click="show = false" wire:submit
                                                                        wire:click='editProfileSave'
                                                                        class="bg-yellowB rounded-xl px-4 py-2 text-lg text-white">Save</button>
                                                                </div>

                                                            </form>
                                                            @endif
                                                        </div>
                                                    </x-slot:body>
                                                </x-modal>

                                                {{-- Open Modal Button--}}
                                                <div class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <button x-data
                                                        x-on:click="$dispatch('open-modal', {name: 'edit-modal'})"
                                                        class="pl-2" wire:click="openEditProfile({{ $user2->id }})">Edit
                                                        User</button>
                                                </div>

                                                {{-- <div wire:click="openEditProfile({{ $user2->id }})"
                                                    class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2 "> Edit Details</p>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>


                    {{-- Inactive/Pending Users --}}
                    @elseif($activeSection === 6)
                    <table class="w-75 p-10 justify-center items-center text-center  bg-gray ">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-2xl font-medium p-2">INACTIVE/PENDING USERS</th>
                            </tr>
                            <tr>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Action</th>
                            </tr>
                        </thead>

                        @foreach($users3 as $user3)
                        <tbody>

                            <tr>
                                <td class="p-2">{{ $user3->id }}</td>
                                <td class="p-2">{{ $user3->name }}</td>
                                <td class="p-2">{{ $user3->email }}</td>
                                <td class="p-2 flex justify-center">
                                    <a wire:click="openModal2({{ $user3->id }})"
                                        style="cursor: pointer; display: flex; justify-content: center; padding-right: 10px">
                                        <img src="{{ asset('images/add.svg') }}" class="h-4 w-4">
                                    </a>
                                    <a wire:click="openModal({{ $user3->id }})"
                                        style="cursor: pointer; display: flex; justify-content: center; padding-left: 10px">
                                        <img src="{{ asset('images/delete.svg') }}" class="h-4 w-4">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @endif
                </div>

            </div>
        </div>



    </div>

    @include("admin.modals.manageUser")

    @livewireScripts
    <script>
        // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
    </script>
</div>