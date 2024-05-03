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

    <form method="post" action="{{route('profile.update')}}">
        @csrf
        @method('patch')
        <div class="flex">
            <div class=" max-w-xl w-48 mx-4">
                <h2 class="text-lg ml-2">Full Name</h2>
                @if ($editMode)
                <input wire:model.live="name" type="text" name="name" value="{{ Auth::user()->name }}"
                    class="border p-2 rounded-lg">
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->name }}
                </div>
                @endif
            </div>
            <div class=" max-w-xl w-fit mx-4">
                <h2 class="text-lg ml-2">Email</h2>
                @if ($editMode)
                <input wire:model.live="email" type="email" name="email" value="{{ Auth::user()->email }}"
                    class="border p-2 rounded-lg w-64">
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->email }}
                </div>
                @endif
            </div>
            <div class=" max-w-xl w-48 mx-4">
                <h2 class="text-lg ml-2">Phone</h2>
                @if ($editMode)
                <input wire:model.live="phone" type="telephone" name="phone" value="{{ Auth::user()->phone }}"
                    class="border p-2 rounded-lg">
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->phone }}
                </div>
                @endif
            </div>
        </div>

        <div class="flex mt-4">
            <div class=" max-w-xl w-48 mx-4">
                <h2 class="text-lg ml-2">Gender</h2>
                @if ($editMode)
                <select class="border p-2 rounded-lg w-44" name="gender" wire:model.live="gender">

                    @if(Auth::user()->gender === 'male')
                    <option value='' selected>male</option>
                    <option value="female">female</option>

                    @elseif(Auth::user()->gender === 'female')
                    <option value='' selected>female</option>
                    <option value="male">male</option>

                    @endif
                </select>
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->gender }}
                </div>
                @endif
            </div>
            <div class=" max-w-xl w-48 mx-4">
                <h2 class="text-lg ml-2">Birthday</h2>
                @if ($editMode)
                <input wire:model.live="birthday" type="date" name="birthday" value="{{ Auth::user()->birthday }}"
                    class="border p-2 rounded-lg">
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->birthday }}
                </div>
                @endif
            </div>
            <div class=" max-w-xl w-48 mx-4">
                <h2 class="text-lg ml-2">Position</h2>
                @if ($editMode)
                <input wire:model.live="position" type="text" name="position" value="{{ Auth::user()->position }}"
                    class="border p-2 rounded-lg">
                {{-- <select class="border p-2 rounded-lg" wire:model="role"
                    wire:change="changeRole({{ Auth::user()->id }})">

                    @if(Auth::user()->hasRole('superadmin'))
                    <option value="admin" selected>Super Admin</option>
                    @elseif(Auth::user()->hasRole('admin'))
                    <option value="admin" selected>Admin</option>
                    <option value="employee">Employee</option>
                    <option value="officemanager">Office Manager</option>

                    @elseif(Auth::user()->hasRole('officemanager'))
                    <option value="officemanager" selected>Office Manager</option>
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>

                    @endif

                </select> --}}
                @else
                <div class="border p-2 rounded-lg" wire:click="toggleEditMode">
                    {{ Auth::user()->position }}
                </div>
                @endif
            </div>
        </div>
        @if($editMode == true)
        <div class="flex justify-content-end mt-1">
            <button type="submit" wire:submit wire:click='editProfileSave' class="btn btn-outline-warning text-dark ">{{
                __('Save') }}</button>
        </div>
        @endif
    </form>


</div>