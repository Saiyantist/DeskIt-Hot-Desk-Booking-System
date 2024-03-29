<div class="flex flex-col">

    {{-- Booking  Controllers --}}
    <div class="flex justify-end items-center mt-24 mr-24">

        {{-- Date Picker --}}
        <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-2">
            <x-calendar>
            </x-calendar>
        </div>


        {{-- Floor Chooser --}}
        <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-2">
            <x-floor>
            </x-floor>
        </div>

        {{-- See Available --}}
        <div class="mr-16">
            {{-- Navigate to desks.blade.php --}}
            <a wire:click="refreshMap" id="nextButton" href='{{route('showDesks')}}'
                class="inline-flex items-center justify-center py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full w-40 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 no-underline my-3">See
                Available Desks
            </a>
        </div>

    </div>

    <main class="flex flex-row justify-center">

        {{-- Side Panel Section --}}
        <section>
            <div>
                {{-- Side Panel Header --}}
                <div class="first-in">
                    <p class=" text-base font-extrabold">WELCOME TO THE DESKIT OFFICE</p>
                    <p class=" text-sm font-normal">The office is specifically crafted to maximize the comfort and
                        productivity of your workday.
                    </p>
                </div>

                {{-- Side Panel Body --}}
                <div class="book text-center">
                    <p class="book-desk text-lg font-semibold py-2">Book a Desk</p>
                    <div class="pb-2">
                        <p class="text-lg font-semibold text-left px-4">Date: {{ $date }}</h6>
                        <div class="flex flex-row justify-content-between px-4">
                            <p class="text-lg font-semibold text-left">Floor# {{ $floor }}</p>
                            <p class="text-lg font-semibold text-left mr-8">Desk# </p>{{-- i removed {{i}}--}}
                        </div>
                    </div>
                    <button disabled class="justify-center items-center bg-gray rounded-xl w-28 h-10 p-1 mb-3 text-black">Book</button>
                </div>

            </div>

            <div class="invisible">

                {{-- Refresh the Map --}}
                {{-- Added a refreshMap function sa Booking.php [jan 16]: disregard this comment muna, livewire kasi
                ito. --}}
                <div class="relative inline-block text-left">

                    {{-- <button onclick="storeBookingDesk()"> Ok </button> --}}

                    {{-- MODALS --}}
                    {{-- @if($selected) --}}
                    @for ($i = 101; $i <= 136; $i++) <div class="modal-wrapper" data-modal-id="{{ $i }}">


                        {{-- Modal 2 --}}
                        <div class="second-modal fixed inset-0 hidden">
                            <div
                                class="flex modals modal-contents absolute bg-grey p-8 rounded-lg w-72 justify-center items-center flex-col">
                                <span class="close absolute -top-6 right-2 text-white cursor-pointer">X</span>
                                <p class="text-lg font-semibold mb-4 text-center">Are you sure you want to book a
                                    desk?</p>
                                <div class="flex flex-row">
                                    <button class="custom-a flex items-center justify-center open-third-modal"
                                        wire:click="book">
                                        Yes
                                    </button> {{-- Include logic here, dapat masave sa db once click --}}
                                    <button class="custom-a flex items-center justify-center close">
                                        No
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Modal 3 --}}
                        <div class="third-modal fixed inset-0 hidden">
                            <div
                                class="flex modals modal-contents absolute bg-grey p-8 rounded-lg w-72 justify-center items-center flex-col">
                                <span class="close absolute -top-6 right-2 text-white cursor-pointer">X</span>
                                <p class="text-lg font-semibold absolute top-2 left-3">Booking <span
                                        class="text-yellowB">placed</span></p>
                                <div class="bg-white m-3 p-3 w-40 text-center">
                                    <p class="text-lg font-semibold">Booking#</p>
                                    <p class="text-lg font-semibold">Floor# {{ $floor }}</p>
                                    <p class="text-lg font-semibold">Desk# {{ $i }}</p>{{-- Include automated
                                    floor#-desk# here --}}
                                    <h6 class="">Date: {{ $date }}</h6> {{-- Include automated date here --}}
                                </div>
                                <a href='{{route('dashboard')}}'
                                    class="flex items-center justify-center w-40 bg-yellowB text-white rounded-lg no-underline py-1">Back
                                    to Home</a>
                            </div>
                        </div>
                </div>
                @endfor
                <script src="{{ asset('js/modal.js') }}"></script>
                {{-- @endif --}}
            </div>

        </section>


        {{-- Desk Map --}}
        <section class="d-flex items-center justify-center m-3">
            <div class=" w-12/12 h-100 bg-gray desk">
                <div class="bg-gray desk m-4 flex flex-row relative justify-center">

                    <div class="absolute bottom-0 left-0">
                        <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                    </div>

                    {{-- LEFT Column --}}
                    <div class="mr-8">
                        <div class="flex items-start ">
                            <div class="b-chair m-3">

                                <div id="101" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="102" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="103" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="104" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- MIDDLE --}}
                    <div class="flex flex-column justify-content-between mx-2">

                        {{-- First Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3 mb-5">

                                <div id="105">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="106">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="107">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="108">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="109">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="110">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Second Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3">

                                <div id="111">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="112">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="113">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="114">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="115">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="116">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Third Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3 mb-5">

                                <div id="105">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="106">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="107">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="108">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="109">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="110">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Fourth Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3">

                                <div id="117">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="118">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="119">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="120">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="121">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="122">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- RIGHT Column --}}
                    <div class="flex flex-column justify-content-between ml-12 mr-5 mt-3">

                        {{-- Upper Desks --}}
                        <div>
                            <div class="b-chair m-3 flex flex-row items-end">

                                <div id="129">
                                    <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="130">
                                    <a><img src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>
                            </div>

                            <div class="b-chair flex -m-4 flex-row justify-start items-start">

                                <div id="132">
                                    <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="131">
                                    <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>
                            </div>
                        </div>

                        {{-- Lower Desks--}}
                        <div class="my-12">
                            <div class="b-chair m-3 flex flex-row items-end">

                                <div id="133">
                                    <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="134">
                                    <a><img src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                            </div>

                            <div class="b-chair flex -m-4 flex-row justify-start items-start">

                                <div id="136">
                                    <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="135">
                                    <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>

        {{-- {{$floor}} --}}
    </main> <!-- for some reason hindi na-u-update 'yung wire:model.lives, i.e. $floor, sa labas nitong </main> -->
    {{--{{$floor}} --}}
    <!-- try changing the floor, this one will remain.
                                    this is a roadblock, TO OUR MODAL. -->








</div>


<!--    {{-- Desk Map ORIGINAL --}}  Organized 
    <section class="d-flex items-center justify-center m-3">
        <div class=" w-12/12 h-max bg-gray desk">
            <div class="bg-gray desk m-4 flex flex-row relative justify-center">

                <div class="absolute bottom-0 left-0">
                    <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                </div>

                {{-- LEFT Column --}}
                <div class="mr-8">
                    <div class="flex items-start ">
                        <div class="b-chair m-3">
                            @for ($i = 0; $i < 4; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/left-chair.svg') }}" class="flex w-14 my-1"
                                    alt="SVG Image"></a>
                                @endfor
                        </div>
                    </div>
                </div>

                
                {{-- MIDDLE --}}
                <div class="mx-2">

                    {{-- First Row --}}
                    <div class="flex justify-center items-start">
                        <div class="b-chair m-3 mb-5">
                            @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                    alt="SVG Image"></a>
                                @endfor
                        </div>
                    </div>

                    {{-- Second Row --}}
                    <div class="flex justify-center items-center">
                        <div class="b-chair m-3">
                            @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                    alt="SVG Image"></a>
                                @endfor
                        </div>
                    </div>

                    {{-- Third Row --}}
                    <div class="flex justify-center items-center">
                        <div class="b-chair mb-5">
                            @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                    alt="SVG Image"></a>
                                @endfor
                        </div>
                    </div>

                    {{-- Fourth Row --}}
                    <div class="flex justify-center items-end">
                        <div class="b-chair m-3">
                            @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                    alt="SVG Image"></a>
                                @endfor
                        </div>
                    </div>
                </div>
                

                {{-- RIGHT Column --}}
                
                <div class=" ml-20">

                    {{-- Desk Cluster --}}
                    @for ($i = 0; $i < 2; $i++) <div class="flex flex-col justify-center mt-2">

                        <div class="b-chair m-3 flex flex-row items-end">
                            <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                    alt="SVG Image"></a>
                            <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                    alt="SVG Image"></a>
                        </div>
                        <div class="b-chair flex -m-4 flex-row justify-start items-start">
                            <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                    alt="SVG Image"></a>
                            <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                    src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                    alt="SVG Image"></a>
                        </div>
                        @if ($i < 1) <span class=" my-4"></span>
                            @endif
                    @endfor
                </div>
            </div>
        </div>
        </div>
    </section>
-->

<!--    {{-- Desk Map ORIGINAL --}}
        <section class="d-flex items-center justify-center m-3">
            <div class=" w-12/12 h-max bg-gray desk">
                <div class="bg-gray desk m-4 flex flex-row relative justify-center">
                    <div class="absolute bottom-0 left-0">
                        <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                    </div>
                    <div class="mr-8">
                        <div class="flex items-start ">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 4; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/left-chair.svg') }}" class="flex w-14 my-1"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                    </div>
    
                    <div class="mx-2">
                        <div class="flex justify-center items-start">
                            <div class="b-chair m-3 mb-5">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="b-chair mb-5">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-end">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <div class=" ml-20">
                        @for ($i = 0; $i < 2; $i++) <div class="flex flex-col justify-center mt-2">
                            <div class="b-chair m-3 flex flex-row items-end">
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                        alt="SVG Image"></a>
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                        alt="SVG Image"></a>
                            </div>
                            <div class="b-chair flex -m-4 flex-row justify-start items-start">
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                        alt="SVG Image"></a>
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                        alt="SVG Image"></a>
                            </div>
                            @if ($i < 1) <span class=" my-4"></span>
                                @endif
                        @endfor
                    </div>
                </div>
            </div>
            </div>
        </section>
-->

{{-- @if ($dateSelected && $floorSelected)
<div class="relative inline-block text-left">
    <a href="{{ route('home.booking.desks') }}" id="nextButton"
        class="inline-flex items-center justify-center py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full w-56 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 no-underline">
        See Available Desks
    </a>
</div>
@endif --}}