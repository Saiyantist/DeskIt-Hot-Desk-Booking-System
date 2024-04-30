<div class="rounded-lg">
    
    <div class="flex justify-center items-center row">
        <div class="flex justify-center items-center bg-lpink pt-2">


            <div class="mx-4">
                <h2 wire:click="setActiveSection(1)" class="justify-center text-xl rounded-t-lg cursor-pointer">
                    ADMINS</h2>
            </div>

            <div class="mx-4">
                <h2 wire:click="setActiveSection(4)" class="justify-center text-xl rounded-t-lg cursor-pointer">
                    OFFICE MANAGERS</h2>
            </div>

            <div class="mx-4">
                <h2 wire:click="setActiveSection(2)" class="justify-center text-xl rounded-t-lg cursor-pointer">
                    USERS</h2>
            </div>
            <div class="mx-4">
                <h2 wire:click="setActiveSection(3)" class=" justify-center text-xl  rounded-t-lg cursor-pointer">
                    INACTIVE/PENDING USERS</h2>
            </div>
        </div>

        <div class="flex justify-center items-center mt-4 ">


            {{-- Admins --}}
            @if($activeSection ===1)
            <table class="w-75 p-10 justify-center items-center text-center bg-gray">

                <thead>
                    <tr>
                        <th class=" text-2xl font-medium p-2">ADMINS</th>
                    </tr>
                    <tr>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">Action</th>
                    </tr>
                </thead>

                @foreach($users as $user)
                <tbody>
                    <tr>
                        @if(Auth::user()->id === $user->id)
                        {{-- Content for the authenticated user --}}
                        <td class="p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        @else
                        {{-- Content for other users --}}
                        <td class="p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">
                            <div x-data="{ isOpen: false }">
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
                                        <div class='flex cursor-pointer' wire:click="openModal({{ $user->id }})">
                                            <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                            <p class=" text-base pl-2"> Delete Admin</p>
                                        </div>
                    
                                        <div  wire:click="openEditProfile({{ $user->id }})" class='flex cursor-pointer'>
                                            <img src="{{ asset('images/edit.svg') }}" class="h-5 w-5">
                                            <p class=" text-base pl-2 "> Edit Details</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>

            {{-- office manager - still dont havae role, temporarily use #activeSection===2 --}}
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

            {{-- employees/users --}}
            @elseif($activeSection=== 2)
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
                                        <div class='flex cursor-pointer' wire:click="openModal({{ $user2->id }})">
                                            <img src="{{ asset('images/thin-delete.svg') }}" class="h-5 w-5">
                                            <p class=" text-base pl-2"> Delete User</p>
                                        </div>
                                        <div  wire:click="openEditProfile({{ $user2->id }})" class='flex cursor-pointer'>
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


            {{-- Inactive/Pending Users --}}
            @elseif($activeSection ===3)
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

            @include("admin.modals.updatedUsermanage")



            @livewireScripts
            <script>
            //    document.addEventListener('click', function(event) {
            //         // Check if the clicked element is outside of the modal
            //         if (!event.target.closest('.showDots')) {
            //             Livewire.emit('closeDots');
            //         }
            //     });
                // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
            </script>
        </div>
    </div>

</div>