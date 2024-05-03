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
                            USERS</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(6)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 6 ? 'active-section' : '' }}">
                            INACTIVE/PENDING USERS</h2>
                    </div>

                </div>

                @if($activeSection ===1)
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
                <div class="flex justify-center items-center mt-3">

                    {{-- Admins --}}
                    @if($activeSection === 3)
                    <table class="w-75 p-10 justify-center items-center text-center bg-gray">
                        <thead>
                            <tr>
                                <th class=" text-2xl font-medium p-2">ADMINS</th>
                            </tr>
                            <tr>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Gender</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Birthday</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Role</th>
                                <th class=" px-12 py-2 justify-center items-center bg-grey">Action</th>
                            </tr>
                        </thead>

                        @foreach($users as $user)
                        <tbody>
                            <tr>
                                <td class="p-2">{{ $user->id }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->gender }}</td>
                                <td class="p-2">{{ $user->birthday }}</td>

                                {{-- Change Role--}}
                                <td class="p-2 flex flex-row">
                                    <select class=" form-select bg-white text-black text-center floors"
                                        wire:model.lazy="role">

                                        @if(Auth::user()->hasRole('superadmin'))

                                        @if($user->hasRole('admin'))

                                        <option value={{$user->roles()->first()->name}} selected>Admin</option>
                                        <option value="employee">Employee</option>
                                        <option value="officemanager">Office Manager</option>
                                    </select>

                                    @elseif($user->hasRole('officemanager'))

                                    <option value={{$user->roles()->first()->name}} selected>Office Manager</option>
                                    <option value="employee">Employee</option>
                                    <option value="admin">Admin</option>
                                    </select>

                                    @elseif($user->hasRole('superadmin'))
                                    <option value={{$user->roles()->first()->name}} selected>Super Admin</option>
                                    </select>
                                    @endif
                                    @endif

                                    <button
                                        class="justify-center items-center bg-yellowB rounded-xl w-28 h-10 p-1 mx-3 my-2 text-white font-bold"
                                        wire:click='changeRole({{ $user->id }})' wire:submit>
                                        Save
                                    </button>
                                </td>

                                {{-- Action --}}
                                <td class="p-2">
                                    <div x-data="{ isOpen: false }">
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
                                                                        <label class="self-start ml-3" for="email">
                                                                            Email:</label>
                                                                        <input type="date" name="birthday" value=''
                                                                            placeholder="{{ $editUserId->birthday }}"
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
                                                        class="pl-2" wire:click="openEditProfile({{ $user->id }})">Edit
                                                        User</button>
                                                </div>



                                                {{-- <div wire:click="openEditProfile({{ $user->id }})"
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
                                                <div class='flex cursor-pointer'
                                                    wire:click="openModal({{ $user2->id }})">
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
                                                                        <label class="self-start ml-3" for="email">
                                                                            Email:</label>
                                                                        <input type="date" name="birthday" value=''
                                                                            placeholder="{{ $editUserId->birthday }}"
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