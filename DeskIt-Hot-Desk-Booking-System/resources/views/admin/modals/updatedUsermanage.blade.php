@if ($showModal)

<div x-data="{ isOpen: {{ $showModal ? 'true' : 'false' }} }">
    <div  x-show="isOpen" @click.away="isOpen = false" class="flex flex-column justify-start bg-danger rounded-4 absolute h-48 w-72"
        style="top: 300px; left: 640px; z-index: 1;">

        <div class='self-end my-1 mr-4 '>
            <button wire:click="closeModal" class=" float-right">X</button>
        </div>

        <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
            <div class='flex justify-center'>
                <p class=" text-lg pt-4 text-center">Are you sure you want to delete this user?</p>
            </div>

            <div class="flex justify-center">
                <button class="bg-danger px-6 py-2 rounded-4 mt-3 text-white" wire:click="deleteUser">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

@endif

@if ($showModal2)
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
    
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
                <button class="bg-green px-6 py-2 rounded-4 mt-3 text-white" wire:click="acceptUser">
                    Accept
                </button>
            </div>
        </div>
    </div>
</div>

@endif

@if ($showDeact)
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
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
            <button class="bg-dark-subtle px-6 py-2 rounded-4 mt-3 text-white" wire:click="deactUser">
                Deactivate
            </button>
        </div>
    </div>
</div>
</div>

@endif

@if ($showModalAddU )
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
    <div class="flex flex-column justify-start bg-darkgray rounded-4 absolute h-48 w-72"
    style="top: 300px; left: 640px; z-index: 1;">

    <div class='self-end my-1 mr-4 '>
        <button wire:click="closeModalAddAsUser" class=" float-right">X</button>
    </div>

    <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg pt-8 text-center">Are you sure you want to change role as User?</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-darkgray px-6 py-2 rounded-4 mt-3 text-white" wire:click="addAsUser">
                Add as User
            </button>
        </div>
    </div>
</div>
</div>

@endif

@if ($showModalAddOM)
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
    <div class="flex flex-column justify-start bg-darkgray rounded-4 absolute h-48 w-72"
    style="top: 300px; left: 640px; z-index: 1;">

    <div class='self-end my-1 mr-4 '>
        <button wire:click="closeModalAddAsOM" class=" float-right">X</button>
    </div>

    <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg pt-8 text-center">Are you sure you want to change role as Office Manager?</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-darkgray px-6 py-2 rounded-4 mt-3 text-white" wire:click="addAsOM">
                Add as Office Manager
            </button>
        </div>
    </div>
</div>
</div>

@endif

@if ($showModalAddA)
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
    <div class="flex flex-column justify-start bg-darkgray rounded-4 absolute h-48 w-72"
    style="top: 300px; left: 640px; z-index: 1;">

    <div class='self-end my-1 mr-4 '>
        <button wire:click="closeModalAddAsUser" class=" float-right">X</button>
    </div>

    <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg pt-8 text-center">Are you sure you want to change role as Admin?</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-darkgray px-6 py-2 rounded-4 mt-3 text-white" wire:click="addAsAdmin">
                Add as Admin
            </button>
        </div>
    </div>
</div>
</div>

@endif

@if ($showEditProfile)
<div x-data="{ isOpen: true }" x-cloak @click.away="isOpen = false">
    <div class=" flex flex-column justify-start bg-gray rounded-4 absolute" style="top: 40vh; z-index: 1;">

        <div class=' justify-center my-1 mr-4'>
            <button wire:click="closeEditProfile" class=" self-end float-right">X</button>
            <p class=" text-lg text-center mt-2">Edit Details</p>
        </div>
    
        <div class='flex bg-gray rounded-bottom-4 m-2 px-3 w-max'>
    
            {{-- not saving when save button is click. It might be due to route --}}
            <form method="post" action="{{route('profile.update')}}">
                @csrf
                @method('patch')
                <label for="name"> Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" class=" rounded-lg text-center w-80 m-2" />
                <br>
                <label for="email"> Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class=" rounded-lg text-center w-80 m-2" />
                <br>
                <div class="flex justify-center items-center">
                    <button type="submit" class=" bg-white px-4 py-1 my-4 rounded-xl">Save</button>
                </div>
    
            </form>
        </div>
    </div>
</div>


@endif