@props(['name', 'title'])
<div
    x-data = "{ show : false , name : '{{ $name}}'}"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x.on:keydown.escape.window = "show = false"
    style="display: none;"
    x-transition.200ms

    class="fixed z-50 inset-0 bg-white-500">

    
    <div x-on:click="show = false" class="fixed inset-0 bg-gray opacity-60"
        wire:click='resetEditData'></div>

    {{-- Modal Dynamic Sizes according to modal type --}}

    {{-- EditModal --}}
    @if($name === 'edit-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-semibold text-2xl">{{ $title }}</span>
                <button class="mr-6 font-thin text-2xl" x-on:click="$dispatch('close-modal')">X</button>
            </div>
            @endif
            <hr class="m-0 p-0">
            <div class="flex h-[90%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>

    @elseif($name === 'deact-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @elseif($name === 'delete-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @elseif($name === 'makeAdmin-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">
            
    @elseif($name === 'makeOM-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @elseif($name === 'makeUser-modal')
        <div class="fixed inset-0 bg-yellowA rounded-4 m-auto w-7/12 max-h-[350px]">

    @endif
        


    </div>


</div>