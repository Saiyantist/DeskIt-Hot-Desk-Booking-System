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
                    Pending Users</h2>
            </div>
        </div>
        <div class="flex justify-center items-center">

            @if($activeSection=== 1)
            <div class=" ">
                <table class=" p-10 text-center bg-gray ">
                    <thead>
                        <tr>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">ID</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Name</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Email</th>
                            <th class=" px-12 py-2 justify-center items-center bg-grey">Action</th>
                        </tr>
                    </thead>

                    @foreach($users2 as $user2)
                    <tbody>
                        <tr>
                            <td class="p-2">{{ $user2->id }}</td>
                            <td class="p-2">{{ $user2->name }}</td>
                            <td class="p-2">{{ $user2->email }}</td>
                            <td class="p-2">
                                <a wire:click="openModal({{ $user2->id }})"
                                    style="cursor: pointer; display: flex; justify-content: center;">
                                    <img src="{{ asset('images/delete.svg') }}" class="h-4 w-4">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>


            @elseif($activeSection ===2)
            <table class=" p-10 justify-center items-center text-center  bg-gray z-10">
                <thead>
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

            @elseif($activeSection ===3)
            <table class=" p-10 justify-center items-center text-center  bg-gray z-10">
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
            <div class=" mod absolute bottom-1/3 left-1/3 bg-white h-48 w-96 shadow-md z-10">
                <button wire:click="closeModal" class=" float-right">X</button>
                <p class=" text-lg pt-4 text-center">Are you sure you want to delete this user?</p>
                <div class="flex justify-around px-3 pt-1">
                    <button wire:click="deleteUser">YES</button>
                    <button wire:click="closeModal">NO</button>
                </div>
            </div>
            @endif
            @if ($showModal2)
            <div class=" mod absolute bottom-1/3 left-1/3 bg-white h-48 w-96 shadow-md z-20">
                <button wire:click="closeModal2" class=" float-right">X</button>
                <p class=" text-lg pt-8 text-center">Are you sure you want to accept this user?</p>
                <div class="flex justify-around px-3 pt-1">
                    <button wire:click="acceptUser">YES</button>
                    <button wire:click="closeModal2">NO</button>
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