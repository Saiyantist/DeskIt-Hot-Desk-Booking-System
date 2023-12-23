
<div class="m-3 text-center">
    <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-4">

        <x-calendar>
            <button @click="open = !open" type="button" 
                class="inline-flex w-40  py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{__('Choose date')}}
            </button>
        </x-calendar>
        <div x-show="open"   
            class="absolute right-0 z-10 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md w-64">
            <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">

                <div>
                    @include('components.calendar')
                </div>

            </div>
        </div>
    </div>
    <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-4" >
        <x-floor>
            <button @click="open = !open" type="button" id="floorButton" 
                class="inline-flex w-40 px-4 py-2 text-sm font-medium text-white  bg-yellowB border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{__('Choose Floor')}}
            </button>
        </x-floor>
        <div x-show="open"
            class="absolute right-0 z-10 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md w-64">
            <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">

                <div>
                    @include('components.floor')
                </div>

            </div>
        </div>
    </div>
    @if ($dateSelected && $floorSelected)
    <div class="relative inline-block text-left">
        <a href="{{ route('home.booking.desks') }}" id="nextButton"
            class="inline-flex items-center justify-center py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full w-56 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 no-underline"wire:click="navigateToDesk">
            Next
        </a>
    </div>
@endif