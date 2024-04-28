<div class="rounded-lg">
    <div class="flex justify-center items-center row">
        <div class="flex justify-center items-center">
            <div class="mx-2">
                <h2 wire:click="setActiveSection(1)"
                    class="inline justify-center text-xl px-4 pt-2 pb-2 bg-yellowB text-white rounded-t-lg cursor-pointer">
                    Employees</h2>
            </div>

            <div class="mx-2">
                <h2 wire:click="setActiveSection(2)"
                    class="inline justify-center text-xl px-4 pt-2 pb-2 bg-yellowB text-white rounded-t-lg cursor-pointer">
                    Admins</h2>
            </div>
            <div class="mx-2">
                <h2 wire:click="setActiveSection(3)"
                    class="inline justify-center text-xl px-4 pt-2 pb-2 bg-yellowB text-white rounded-t-lg cursor-pointer">
                    Inactive/Pending Users</h2>
            </div>
        </div>
        <div class="flex justify-center items-center">

            {{-- Employee --}}
            @if($activeSection=== 1)
                <table class="w-75 p-10 text-center bg-gray ">
                    <thead>
                        <tr>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                            <th class=" w-25 px-12 py-2 justify-center items-center bg-grey">Action</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Position</th>
                        </tr>
                    </thead>

                    @foreach($users2 as $user2)
                    <tbody>
                        <tr>
                            <td class="p-2">{{ $user2->id }}</td>
                            <td class="p-2">{{ $user2->name }}</td>
                            <td class="p-2">{{ $user2->email }}</td>
                            <td class="p-2">
                                <div class="flex flex-row justify-evenly items-center">
                                    <a wire:click="deactModal({{ $user2->id }})"
                                        style="cursor: pointer; display: flex; justify-content: center;">
                                        <p class="text-base text-black p-2 px-3 rounded-2 bg-dark-subtle mt-3 ml-3">Deactivate</p>
                                    </a>
    
                                    <a wire:click="openModal({{ $user2->id }})"
                                        class="mx-2 p-2 bg-danger rounded-2"
                                        style="cursor: pointer; display: flex; justify-content: center;">
                                        <img src="{{ asset('images/delete.svg') }}" class="h-4 w-4">
                                    </a>
                                </div>
                            </td>
                            <td class="p-2 flex flex-row">
                                <select class=" form-select bg-white text-black text-center floors"
                                wire:model.lazy="position" 
                                >
                                <option value="{{ $user2->position }}" selected>{{ $user2->position }}</option>
                                <option value="Employee">Employee</option>
                                <option value="Front-end Dev">Front-end Dev</option>
                                <option value="Back-end Dev">Back-end Dev</option>
                                <option value="UI/UX Designer">UI/UX Designer</option>
                                <option value="System Analyst">System Analyst</option>
                                <option value="Solutions Architect">Solutions Architect</option>
                                <option value="Project Mnager">Project Mnager</option>
                                <option value="Full Stack Developer">Full Stack Developer</option>
                                </select>

                                <button class="justify-center items-center bg-yellowB rounded-xl w-28 h-10 p-1 mx-3 my-2 text-white font-bold"
                                wire:click='changePosition({{ $user2->id }})'
                                wire:submit>
                                Save
                                </button>
                                
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            {{-- Admins --}}
            @elseif($activeSection ===2)
            <table class="w-50  p-10 justify-center items-center text-center  bg-gray z-10">
                <thead>
                    <tr>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                        <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
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
                            <a wire:click="openModal({{ $user->id }})"
                                style="cursor: pointer; display: flex; justify-content: center;">
                                <img src="{{ asset('images/delete.svg') }}" class="h-4 w-4">
                            </a>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>

            {{-- Inactive/Pending Users --}}
            @elseif($activeSection ===3)
            <table class="w-50 p-10 justify-center items-center text-center  bg-gray">
                <thead>
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

            @if ($showModal)
            <div class="flex flex-column justify-start bg-danger rounded-4 absolute h-48 w-72"
                style="top: 300px; left: 640px; z-index: 1;">

                <div class='self-end my-1 mr-4 '>
                    <button wire:click="closeModal" class=" float-right">X</button>
                </div>
        
                <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
                    <div class='flex justify-center'>
                        <p class=" text-lg pt-4 text-center">Are you sure you want to delete this user?</p>
                    </div>
            
                    <div class="flex justify-center">
                        <button class="bg-danger px-6 py-2 rounded-4 mt-3 text-white"
                            wire:click="deleteUser">
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            @elseif ($showModal2)

            <div class="flex flex-column justify-start bg-green rounded-4 absolute h-48 w-72"
                style="top: 300px; left: 640px; z-index: 1;">

                <div class='self-end my-1 mr-4 '>
                    <button wire:click="closeModal2" class=" float-right">X</button>
                </div>
        
                <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
                    <div class='flex justify-center'>
                        <p class=" text-lg pt-8 text-center">Are you sure you want to accept this user?</p>
                    </div>
            
                    <div class="flex justify-center">
                        <button class="bg-green px-6 py-2 rounded-4 mt-3 text-white"
                            wire:click="acceptUser">
                            Accept
                        </button>
                    </div>
                </div>
            </div>

            @elseif ($showDeact)
            <div class="flex flex-column justify-start bg-dark-subtle rounded-4 absolute h-48 w-72"
                style="top: 300px; left: 640px; z-index: 1;">

                <div class='self-end my-1 mr-4 '>
                    <button wire:click="closeDeactModal" class=" float-right">X</button>
                </div>
        
                <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
                    <div class='flex justify-center'>
                        <p class=" text-lg pt-8 text-center">Are you sure you want to deactivate this user?</p>
                    </div>
            
                    <div class="flex justify-center">
                        <button class="bg-dark-subtle px-6 py-2 rounded-4 mt-3 text-white"
                            wire:click="deactUser">
                            Deactivate
                        </button>
                    </div>
                </div>
            </div>
            @endif



            @livewireScripts
            <script>
                // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
            </script>
        </div>
    </div>

</div>