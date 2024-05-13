<div class=" bg-white">
    <div class=" h-fit" style="border-left:1px solid rgba(128, 128, 128, 0.2);">
        
        <div class="ml-24 pb-10">
            <form method="post" action="{{route('profile.update')}}"
                wire:submit="editProfileSave"
                >
                @csrf
                @method('patch')
    
                <div class="flex justify-between">
                    <div class="m-10">
                        <h2 class="font-extrabold text-2xl">Personal Information</h2>
                    </div>
        
                    {{-- Edit Details --}}
                    <div class="flex m-10">
                        <div class="cursor-pointer text-white h-fit w-32 text-center" wire:click="toggleEditMode">
                            
                            @if($editMode)
                            <button type="submit" class=" bg-yellowB rounded-xl px-4 py-2 font-medium text-xl">
                                <i class="fa-regular fa-floppy-disk px-1"></i>
                                Save
                            </button>
                            @else
                                <h2 class="bg-blue p-2 text-base rounded-md">
                                    <i class="fa-solid fa-pen-to-square px-1"></i>
                                    Edit Details
                                </h2>
                            @endif
                        </div>
                    </div>
                </div>


                {{-- first row --}}
                <div class="flex">
                    {{-- User Full Name --}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Full Name</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80" 
                            wire:model.live="editName" type="text" name="name"
                            value="{{ Auth::user()->name }}">
    
                        @else
                        <div class="border p-2 rounded-lg w-80" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->name }}
                        </div>
    
                        @endif
                    </div>
    
                    {{-- User Email --}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Email</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80" 
                            wire:model.live="editEmail" type="email"
                            name="email" value="{{ Auth::user()->email }}">
    
                        @else
                        <div class="border p-2 rounded-lg w-80" 
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
                        <select class="border p-2 rounded-lg w-80" name="gender" 
                            wire:model.live="editGender">
    
                            @if(Auth::user()->gender === 'male')
                            <option value='' selected>male</option>
                            <option value="female">female</option>
    
                            @elseif(Auth::user()->gender === 'female')
                            <option value='' selected>female</option>
                            <option value="male">male</option>
    
                            @endif
                        </select>
    
                        @else
                        <div class="border p-2 rounded-lg w-80" 
                            wire:click="toggleEditMode">
                            {{ Auth::user()->gender }}
                        </div>
    
                        @endif
                    </div>
    
                    {{-- User Birthday--}}
                    <div class=" max-w-xl w-fit mx-4">
                        <h2 class="text-lg ml-2">Birthday</h2>
    
                        @if ($editMode)
                        <input class="border p-2 rounded-lg w-80" 
                            wire:model.live="editBirthday" type="date"
                            name="birthday" value="{{ Auth::user()->birthday }}">
    
                        @else
                        <div class="border p-2 rounded-lg w-80" 
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