<div>

    <div class="flex justify-center items-center mt-2">
    
        <div class="flex flex-row justify-center items-center mt-4 bg-white ml-16 mb-10 w-[80%] rounded-xl shadow-md"
            style="border:1px solid rgba(128, 128, 128, 0.2);">
            <div class="self-start w-full">

                {{-- Primary TABS --}}
                <div class="flex" style=" border-bottom: 1px solid rgba(128, 128, 128, 0.2);">

                    {{-- Account Settings --}}
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 rounded-tl-xl {{ $activeSection == 1 ? 'border-solid border-yellowB border-b-[3px] bg-yellowLight' : '' }}"
                        wire:click="setActiveSection(1)">
                        <h2 class="justify-center text-xl">Account Settings</h2>
                    </div>

                    {{-- Manage Users (hidden for employees) --}}
                    @if(Auth::user()->roles->whereNotIn('name', 'employee')->isNotEmpty())
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 {{ $activeSection == 2 ? 'border-solid border-yellowB border-b-[3px] bg-yellowLight' : '' }}"
                        wire:click="setActiveSection(2)">
                        <h2 class="justify-center text-xl">Manage Users</h2>
                    </div>
                    @else
                    {{-- show nothing --}}
                    @endif

                    {{-- Notification Settings(hidden for admins) --}}
                    @if(Auth::user()->roles->where('name', 'employee')->isNotEmpty())
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200  {{ $activeSection == 3 ? 'border-solid border-yellowB border-b-[3px] bg-yellowLight' : '' }}"
                        wire:click="setActiveSection(3)">
                        <h2 class="justify-center text-xl">Notification Settings</h2>
                    </div>
                    @else
                    {{-- show nothing --}}
                    @endif
                </div>

                {{-- Account Settings SECONDARY TABS --}}
                @if($activeSection === 1)    
                    <div class="flex flex-row">
                        <div class="flex flex-col m-10">
                            <div class="flex self-center rounded-xl pt-2 px-2 w-60 cursor-pointer border-1 border-solid border-gray-400 transition ease-in-out delay-50 hover:bg-yellowA duration-100 {{ $activeSecondaryTabAS == 1 ? 'bg-yellowLight' : '' }}"
                                {{-- style="border:1px solid rgba(128, 128, 128, 0.9);" --}}
                                >
                                <h2 wire:click="setActiveAS(1)" class="text-lg">
                                    Profile Information <i class="fa-solid fa-chevron-right pl-10"></i></h2>
                            </div>

                            <div class="flex self-center rounded-xl mt-2 pt-2 px-2 w-60 cursor-pointer border-1 border-solid border-gray-400 transition ease-in-out delay-50 hover:bg-yellowA duration-100 {{ $activeSecondaryTabAS == 2 ? 'bg-yellowLight' : '' }}"
                                {{-- style="border:1px solid rgba(128, 128, 128, 0.9);" --}}
                                >
                                <h2 wire:click="setActiveAS(2)" class=" text-lg">
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
                            </div>  
                            @endif
                        </div>
                    </div>
                
                {{-- Notification Settings SECONDARY Tabls --}}
                @elseif($activeSection === 3) 
                <div class="bg-white">
                        @livewire('notifcation-preferences')
                </div>

                {{-- Manage Users SECONDARY Tabs --}}
                @elseif($activeSection === 2)
                
                    <div class="flex flex-row pt-2 bg-gray-100">

                        {{-- ADMINS TAB --}}
                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                        {{-- <div class="px-4 pt-3 pb-2 transition ease-in-out delay-100 hover:bg-yellowA duration-300 {{ $activeSecondaryTabMU == 'admins' ? 'border-solid border-yellowB border-b-[3px]  bg-yellowLight' : '' }}"> --}}
                        <div class="mx-3 px-4 py-1 rounded-t-lg cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 {{ $activeSecondaryTabMU == 'admins' ? 'bg-white' : '' }}"
                            wire:click="setActiveMU('admins')">
                            <h2 class="mt-1 text-xl">Admins</h2>
                        </div>
                        
                        {{-- OFFICE MANAGERS TAB --}}
                        <div class="mx-3 px-4 py-1 rounded-t-lg cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 {{ $activeSecondaryTabMU == 'oms' ? 'bg-white' : '' }}"
                            wire:click="setActiveMU('oms')">
                            <h2 class="mt-1 text-xl">Office Managers</h2>
                        </div>
    
                        @endif

                        {{-- EMPLOYEES TAB --}}
                        <div class="mx-3 px-4 py-1 rounded-t-lg cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 {{ $activeSecondaryTabMU == 'emps' ? 'bg-white' : '' }}"
                            wire:click="setActiveMU('emps')">
                            <h2 class="mt-1 text-xl">Employees</h2>
                        </div>
    
                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                        {{-- INACTIVE/PENDING USERS TAB--}}
                        <div class="mx-3 px-4 py-1 rounded-t-lg cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 {{ $activeSecondaryTabMU == 'pendings' ? 'bg-white' : '' }}"
                            wire:click="setActiveMU('pendings')">
                            <h2 class="mt-1 text-xl">Inactive/Pending Users</h2>
                        </div>
                        @endif

                    </div>

                {{-- SECONDARY Tabs Content --}}
                <div class="flex justify-center items-center p-3 text-sm">
    
                    {{-- Admins --}}
                    @if($activeSecondaryTabMU == 'admins')
                    <table class="w-full justify-center items-center text-center bg-white">
                        <thead>
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

                                    <td class="p-2 flex justify-content-around">

                                        {{-- Make Employee Open --}}
                                        <button class='transition ease-in-out transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveEmpId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'makeEmp-modal'})">
                                            <img src="{{ asset('images/employee_new.svg') }}" class="h-6">
                                            <span class="text-yellowBdarker text-sm font-medium pl-2">Employee</span>
                                        </button>

                                        {{-- Make OM Open --}}
                                        <button class='transition ease-in-out transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
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
                                        <button class='transition ease-in-out hover:bg-blue-200 hover:scale-101 duration-200 bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                            <span class="text-blue-800 text-sm pl-2">Edit</span>
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user->id }})"
                                                class="transition ease-in-out hover:bg-slate-300 hover:scale-101 duration-200 bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                >
                                            <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                            <span class="text-slate-600 text-sm pl-2">Deactivate</span>
                                        </button>

                                        {{-- Delete Modal Open--}}
                                        <button class='transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                wire:click="saveDeleteId({{ $user->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                            <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                        </button>
          
                                    </div>


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
                                    <button class='transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                            wire:click="saveEmpId({{ $user4->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeEmp-modal'})">
                                        <img src="{{ asset('images/employee_new.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Employee</span>
                                    </button>

                                    @if(Auth::user()->hasRole('superadmin'))

                                    {{-- Make Admin Open --}}
                                    <button class='transition ease-in-out transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                            wire:click="saveAdminId({{ $user4->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'makeAdmin-modal'})">
                                        <img src="{{ asset('images/admin.svg') }}" class="h-6">
                                        <span class="text-yellowBdarker text-sm font-medium pl-2">Admin</span>
                                    </button>
                                    @endif

                                </td>

                                

                                {{-- Action --}}
                                <td class="p-2">

                                    {{-- Buttons --}}
                                    <div class="flex justify-content-around">

                                        {{-- Edit Modal Open--}}
                                        <button class='transition ease-in-out hover:bg-blue-200 hover:scale-101 duration-200 bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveEditId({{ $user4->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                            <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                            <span class="text-blue-800 text-sm pl-2">Edit</span>
                                        </button>
    
                                        {{-- Deact Modal Open--}}
                                        <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                wire:click="saveDeactId({{ $user4->id }})"
                                                class="transition ease-in-out hover:bg-slate-300 hover:scale-101 duration-200 bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                >
                                            <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                            <span class="text-slate-600 text-sm pl-2">Deactivate</span>
                                        </button>

                                        {{-- Delete Modal Open--}}
                                        <button class='transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                wire:click="saveDeleteId({{ $user4->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                            <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                        </button>
          
                                    </div>
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
                                        <button class='transition ease-in-out transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveOMId({{ $user2->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'makeOM-modal'})">
                                            <img src="{{ asset('images/omanager_new.svg') }}" class="h-6">
                                            <span class="text-yellowBdarker text-sm font-medium pl-2">Office Mgr.</span>
                                        </button>

                                        @if(Auth::user()->hasRole('superadmin'))
                                        {{-- Make Admin Open --}}
                                        <button class='transition ease-in-out transition ease-in-out hover:bg-yellowA duration-50 bg-yellowLight px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                wire:click="saveAdminId({{ $user2->id }})"
                                                x-data x-on:click="$dispatch('open-modal', {name: 'makeAdmin-modal'})">
                                            <img src="{{ asset('images/admin.svg') }}" class="h-6">
                                            <span class="text-yellowBdarker text-sm font-medium pl-2">Admin</span>
                                        </button>
                                        @endif

                                    </td>
                                
                                    {{-- Action --}}
                                    <td class="p-2">

                                        {{-- Buttons --}}
                                        <div class="flex justify-content-around">

                                            {{-- Edit Modal Open--}}
                                            <button class='transition ease-in-out hover:bg-blue-200 hover:scale-101 duration-200 bg-blue-100 px-2.5 rounded-2xl py-1.5 flex items-center cursor-pointer'
                                                    wire:click="saveEditId({{ $user2->id }})"
                                                    x-data x-on:click="$dispatch('open-modal', {name: 'edit-modal'})">
                                                <img src="{{ asset('images/edit.svg') }}" class="h-6">
                                                <span class="text-blue-800 text-sm pl-2">Edit</span>
                                            </button>
        
                                            {{-- Deact Modal Open--}}
                                            <button x-data x-on:click="$dispatch('open-modal', {name: 'deact-modal'})" 
                                                    wire:click="saveDeactId({{ $user2->id }})"
                                                    class="transition ease-in-out hover:bg-slate-300 hover:scale-101 duration-200 bg-slate-200 ml-1 px-2.5 rounded-2xl flex items-center cursor-pointer"
                                                    >
                                                <img src="{{ asset('images/deactivate.svg') }}" class="h-6">
                                                <span class="text-slate-600 text-sm pl-2">Deactivate</span>
                                            </button>

                                            {{-- Delete Modal Open--}}
                                            <button class='transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                                    wire:click="saveDeleteId({{ $user2->id }})"
                                                    x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                                <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                            </button>
            
                                        </div>



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
                                    <button class='transition ease-in-out hover:bg-green-300 hover:scale-101 duration-200 bg-green-200 px-2.5 rounded-2xl py-2 flex items-center cursor-pointer'
                                            wire:click="saveActivateId({{ $user3->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'activate-modal'})">
                                        <img src="{{ asset('images/activate.svg') }}" class="h-5">
                                        <span class="text-green-800 text-sm pl-2">Activate</span>
                                    </button>

                                    {{-- Delete Modal Open--}}
                                    <button class='transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-xl flex items-center cursor-pointer'
                                            wire:click="saveDeleteId({{ $user3->id }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'delete-modal'})">
                                        <img src="{{ asset('images/delete.svg') }}" class="h-6">
                                    </button>

                                    {{-- Activate Modal --}}
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

    {{-- Modals--}}
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
                                    class="border-1 border-gray-200 border rounded-lg text-left w-80 m-2 mt-1"
                                    wire:model.live='editName'/>
                            </div>

                            {{-- Email --}}
                            <div class="flex flex-column ">
                                <label class="self-start ml-3" for="email"> Email:</label>
                                <input type="email" name="email" value='' placeholder="{{ $editUserId->email }}"
                                    class="border-1 border-gray-200 border rounded-lg text-left w-80 m-2 mt-1 "
                                    wire:model.live='editEmail'/>
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="flex flex-row justify-content-evenly mt-3">
                            
                            {{-- Gender --}}
                            <div class="flex flex-column">
                                <label class="self-start ml-3" for="name"> Gender:</label>
                                <select class="p-2.5 border-1 border-gray-200 border bg-white text-black text-left rounded-lg  w-80 m-2 mt-1"
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
                                    class="border-1 border-gray-200 border rounded-lg text-left w-80 m-2 mt-1"
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
        </div>

    {{-- @include("admin.modals.manageUser") --}}

    @livewireScripts
    {{-- <script>
        // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
    </script> --}}
</div>