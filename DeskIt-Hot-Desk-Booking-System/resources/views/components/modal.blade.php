@props(['name', 'title', ])
<div
    x-data = "{ show : false , name : '{{ $name}}'}"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    style="display: none;"
    x-transition.delay.350ms

    class="fixed z-50 inset-0 bg-white-500">

    
    <div x-on:click="$dispatch('close-modal')" class="fixed inset-0 bg-gray opacity-60"
        wire:click='resetEditData'></div>

    {{-- Modal Dynamic Sizes according to modal type --}}

    {{-- EditModal --}}
    @if($name === 'edit-modal')
        <div class="fixed inset-0 border-solid border-darkBlue border-2 bg-blue rounded-4 m-auto w-7/12 max-h-[400px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-semibold text-2xl text-white">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkBlue m-0 p-0">
            <div class="flex h-[85.7%] items-center justify-center bg-white rounded-bottom-4 p-0">
                {{ $body }}
            </div>

    {{-- Deact Modal --}}
    @elseif($name === 'deact-modal')
    <div class="fixed inset-0 border-solid border-darkergray border-2 bg-slate-300 rounded-4 m-auto w-1/4 max-h-[250px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-semibold text-2xl text-darkergray">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkergray m-0 p-0">
            <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>

    {{-- Delete Modal --}}
    @elseif($name === 'delete-modal')
        <div class="fixed inset-0 border-solid border-darkRed border-2 bg-red rounded-4 m-auto w-1/4 max-h-[250px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-semibold text-2xl text-darkRed">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkRed m-0 p-0">
            <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>



    @elseif($name === 'makeAdmin-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">
            
    @elseif($name === 'makeOM-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @elseif($name === 'makeUser-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @endif
        


    </div>


</div>