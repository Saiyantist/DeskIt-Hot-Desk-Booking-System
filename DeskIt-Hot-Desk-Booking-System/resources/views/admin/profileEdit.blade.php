<div class=" bg-white " style="width: 80%;">
    <div class=" h-fit relative" style="border-left:1px solid rgba(128, 128, 128, 0.2);">
        <div class="flex justify-between">

            <div class="m-10">
                <h2 class="font-semibold text-2xl">Personal Information</h2>
            </div>

        </div>

        <div class="mx-10 pb-10">
            <form wire:submit.prevent="editProfile">
                @csrf
                @method('patch')
                
                {{-- buttons --}}
                <div class=" absolute left-full top-10 cursor-pointer text-white h-fit text-center" wire:click="toggleEditMode">
                    @if($editMode)
                        <button type="submit" class="btn btn-warning text-white w-32">{{
                        __('Save') }}</button>
                    @else
                        <h2 class="bg-blue p-2 text-base rounded-md w-32">
                            <i class="fa-solid fa-pen-to-square px-1"></i>
                            Edit Details
                        </h2>
                    @endif
                </div>

                {{-- first row --}}
                <div class="flex">
                    {{-- User Full Name --}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Full Name</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80 element-selector" 
                            wire:model.live="name" 
                            type="text" 
                            name="name"
                            {{-- @click.away="$wire.set('editMode', false)" --}}
                            >
                    
                        @else
                        <div class="border p-2 rounded-lg w-80 element-selector" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->name }}
                        </div>
    
                        @endif
                    </div>
    
                    {{-- User Email --}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Email</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80 element-selector" 
                            wire:model.live="email" type="email"
                            {{-- @click.away="$wire.set('editMode', false)" --}}
                            >
                            
                        @else
                        <div class="border p-2 rounded-lg w-80 element-selector" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->email }}
                        </div>
    
                        @endif
                    </div>
    
                </div>
    
                {{-- second row --}}
                <div class="flex mt-4">
                    {{-- User Gender --}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Gender</h2>
    
                        @if ($editMode)
                        <select class="border p-2 rounded-lg w-80 element-selector" name="gender" 
                            wire:model.live="editGender"
                            {{-- @click.away="$wire.set('editMode', false)" --}}
                            >
    
                            @if(Auth::user()->gender === 'male')
                            <option value='' selected>male</option>
                            <option value="female">female</option>
    
                            @elseif(Auth::user()->gender === 'female')
                            <option value='' selected>female</option>
                            <option value="male">male</option>
    
                            @endif
                            
                        </select>
    
                        @else
                        <div class="border p-2 rounded-lg w-80 element-selector" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->gender }}
                        </div>
    
                        @endif
                    </div>
    
                    {{-- User Birthday--}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Birthday</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80 element-selector" 
                            wire:model.live="birthday" type="date"
                            name="birthday"
                            {{-- @click.away="$wire.set('editMode', false)" --}}
                            >
                            
                        @else
                        <div class="border p-2 rounded-lg w-80 element-selector" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->birthday }}
                        </div>
    
                        @endif
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>