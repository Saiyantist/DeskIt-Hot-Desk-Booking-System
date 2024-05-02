<div class=" bg-white ">
    <div class="flex justify-between">
        <div>
            <h2 class=" text-xl mb-4">Personal Information</h2>

        </div>
        <div>
            <h2 wire:click="toggleEditMode" class="text-base cursor-pointer bg-blue text-white p-2 rounded-md"><i
                    class="fa-solid fa-pen-to-square"></i> Edit Details</h2>
        </div>
    </div>

    <div class="flex">
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Full Name</h2>
            @if ($editMode)
            <input wire:model="name" type="text" name="name" placeholder="Name" class="border p-2 rounded-lg ">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->name }}
            </div>
            @endif
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Email</h2>
            @if ($editMode)
            <input wire:model="email" type="email" name="email" placeholder="Email" class="border p-2 rounded-lg">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->email }}
            </div>
            @endif
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Phone</h2>
            @if ($editMode)
            <input wire:model="phone" type="telephone" name="phone" placeholder="Phone" class="border p-2 rounded-lg">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->phone }}
            </div>
            @endif
        </div>
    </div>

    <div class="flex">
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Gender</h2>
            @if ($editMode)
            <input wire:model="gender" type="text" name="gender" placeholder="Gender" class="border p-2 rounded-lg">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->gender }}
            </div>
            @endif
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Birthday</h2>
            @if ($editMode)
            <input wire:model="birthday" type="date" name="birthday" placeholder="Birthday"
                class="border p-2 rounded-lg">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->birthday }}
            </div>
            @endif
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Position</h2>
            @if ($editMode)
            <input wire:model="position" type="text" name="position" placeholder="Position"
                class="border p-2 rounded-lg">
            @else
            <div class="border p-2 rounded-lg cursor-pointer" wire:click="toggleEditMode">
                {{ Auth::user()->position }}
            </div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-4  d-flex justify-content-end">
        {{-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{ __('Back') }}</button> --}}
        <button type="submit" class="btn btn-outline-warning text-dark ">{{ __('Save') }}</button>
    </div>

</div>