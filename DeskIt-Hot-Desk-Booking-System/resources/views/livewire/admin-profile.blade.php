<div class="rounded-lg">

    <div class="flex justify-center items-center mt-2 ">
    
        {{-- TAB CHOOSER/PICKER --}}
        <div class="flex flex-row justify-center items-center mt-4 bg-white ml-16" style="width: 80%; border:1px solid rgba(128, 128, 128, 0.2);">
            <div class="self-start w-full p-2" style=" border-bottom: 1px solid rgba(128, 128, 128, 0.5);">
                <div class="flex ">
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
                            USERS</h2>
                    </div>
                    
                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(6)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 6 ? 'active-section' : '' }}">
                            INACTIVE/PENDING USERS</h2>
                    </div>
                    
                </div>

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
                        <tbody class="border border-1 border-zinc-800">
                            <tr>
                                
                                <td class="p-2">{{ $user->id }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->gender }}</td>
                                <td class="p-2">{{ $user->birthday }}</td>
                                
                                {{-- Change Role--}}
                                
                                @if(Auth::user()->hasRole('superadmin'))

                                <td class="p-2 flex justify-content-center">

                                    {{-- Change into User --}}
                                    <div wire:click="showModalAddAsUser({{ $user->id }})" class='border-solid border-1 bg-grey flex flex-row-reverse cursor-pointer p-2 px-3 rounded-lg mr-3'>
                                        <span class="text-sm font-thin pl-2">User</span>
                                        <img src="{{ asset('images/user.svg') }}" class="h-5 w-5">
                                    </div>

                                    {{-- Change into Office Manager --}}
                                    <div wire:click="showModalAddAsOM({{ $user->id }})" class='border-solid border-1 bg-grey flex flex-row-reverse cursor-pointer p-2 px-3 rounded-lg ml-3'>
                                        <span class="text-sm font-thin pl-2">Office Manager</span>
                                        <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                    </div>

                                </td>

                                @endif
    
                                {{-- Action --}}
                                <td class="p-2">

                                    {{-- Buttons --}}
                                    <div class="flex justify-content-evenly">

                                        {{-- Edit Modal Open--}}
                                        <button class='border-solid border-darkBlue border-2 bg-blue px-[10px] py-2 rounded-lg flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class=" h-5 w-5">
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user->id }})"
                                                class="border-solid border-darkgray border-2 bg-grey px-[10px] py-2 rounded-lg flex cursor-pointer text-sm text-darkergray"
                                                >Deactivate
                                        </button>

                                        {{-- Delete Modal Open--}}
                                        <button class='border-solid border-darkRed border-2 bg-red px-[10px] py-2 rounded-lg flex cursor-pointer'
                                                wire:click="saveDeleteId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                            <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                        </button>
          
                                    </div>

                                    {{-- EditModal --}}
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
                                                                class="bg-blue rounded-xl px-4 py-2 font-semibold text-2xl text-white"
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
                                                    <button class="flex items-center border-solid border-darkergray border-2 px-4 py-2 rounded-4 font-semibold text-lg text-darkergray"
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
                                                    <button class="flex items-center border-solid border-darkRed border-2 px-4 py-2 rounded-4 font-semibold text-lg text-darkRed"
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
                                        
                                        <div x-show="isOpen" @click.away="isOpen = false" class="showDots flex absolute h-44 w-64 right-8 z-50" >
    
                                            <div class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>
                                                
                                                <div wire:click="showModalAddAsUser({{ $user->id }})" class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/user.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as a User</p>
                                                </div>
                                                <div class='flex cursor-pointer' wire:click="showModalAddAsOM({{ $user->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Office Manager</p>
                                                </div>
    
                                                <div class='flex cursor-pointer' wire:click="deactModal({{ $user->id }})">
                                                    <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Deact Admin</p>
                                                </div>

                                                <div wire:click="openEditProfile({{ $user->id }})" class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2 "> Edit Details</p>
                                                </div>
    
                                            </div>
                                            
                                        </div>
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
                                        <div x-show="isOpen" @click.away="isOpen = false" class="showDots flex absolute h-44 w-64 right-8 z-50 ">
    
                                            <div class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>
                                                <div wire:click="showModalAddAsUser({{ $user4->id }})" class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/user.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as a User</p>
                                                </div>
                                                <div class='flex cursor-pointer' wire:click="showModalAddAsAdmin({{ $user4->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Admin</p>
                                                </div>
                                                <div class='flex cursor-pointer' wire:click="openModal({{ $user4->id }})">
                                                    <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Delete Office Manager</p>
                                                </div>
                                                <div  wire:click="openEditProfile({{ $user4->id }})" class='flex cursor-pointer'>
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
                                        <div x-show="isOpen" @click.away="isOpen = false" class="showDots flex absolute h-44 w-64 right-8 z-50 ">
    
                                            <div class='flex row bg-dark-subtle rounded-4 p-3 items-center justify-center'>
                                                <div class='flex cursor-pointer' wire:click="showModalAddAsAdmin({{ $user2->id }})">
                                                    <img src="{{ asset('images/omanager.svg') }}" class="h-5 w-5">
                                                    <p class=" text-base pl-2"> Add as an Admin</p>
                                                </div>
                                                <div class='flex cursor-pointer' wire:click="showModalAddAsOM({{ $user2->id }})">
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
                                                        <div class='flex justify-center rounded-3 bg-gray-200 w-[90%] h-[85%] p-2'>
                                                            @if($editUserId)
                                                            <form method="post" action="{{route('profile.update')}}">
                                                                @csrf
                                                                @method('patch')
                                                                {{-- Row 1 --}}
                                                                <div class="flex flex-row justify-content-evenly">
    
                                                                    {{-- Name --}}
                                                                    <div class="flex flex-column">
                                                                        <label class="self-start ml-3" for="name"> Name:</label>
                                                                        <input type="text" name="name" value='' placeholder="{{ $editUserId->name }}"
                                                                            class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1"
                                                                            wire:model.lazy='editName'/>
                                                                    </div>
            
                                                                    {{-- Email --}}
                                                                    <div class="flex flex-column ">
                                                                        <label class="self-start ml-3" for="email"> Email:</label>
                                                                        <input type="email" name="email" value='' placeholder="{{ $editUserId->email }}"
                                                                            class="border-2 border-black border rounded-lg text-left w-80 m-2 mt-1 "
                                                                            wire:model.lazy='editEmail'/>
                                                                    </div>
                                                                </div>
    
                                                                {{-- Row 2 --}}
                                                                <div class="flex flex-row justify-content-evenly mt-3">
                                                                    
                                                                    {{-- Gender --}}
                                                                    <div class="flex flex-column">
                                                                        <label class="self-start ml-3" for="name"> Gender:</label>
                                                                        <select class="border-2 border-black border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
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
                                                                            wire:model.lazy='editBirthday'/>
                                                                    </div>
                                                                </div>
    
                                                                <br>
                                                                <div class="flex justify-center items-center">
                                                                    <button x-on:click="show = false" wire:submit wire:click='editProfileSave' class="bg-yellowB rounded-xl px-4 py-2 text-lg text-white">Save</button>
                                                                </div>
    
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </x-slot:body>
                                                </x-modal>
    
                                                {{-- Open Modal Button--}}
                                                <div class='flex cursor-pointer'>
                                                    <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                                    <button x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})" 
                                                            class="pl-2"
                                                            wire:click="openEditProfile({{ $user2->id }})"
                                                            >Edit User</button>
                                                </div>
    
                                                {{-- <div wire:click="openEditProfile({{ $user2->id }})" class='flex cursor-pointer'>
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