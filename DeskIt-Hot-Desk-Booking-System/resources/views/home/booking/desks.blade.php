@extends('layouts.layout')
<x-app-layout>
    @section('content')

    <main class="flex flex-row justify-center items-center mt-28">
        <section>
            <div class="flex justify-center items-center flex-col m-3">
                <div class="first-in">
                    <h4>WELCOME TO THE DESKIT OFFICE</h4>
                    <h6>The office is specifically crafted to maximize the comfort and productivity of your workday.
                    </h6>
                </div>

                <div class="m-3 text-center">
                    <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-4">

                        <x-calendar>
                            <button @click="open = !open" type="button"
                                class="inline-flex w-40  py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                
                                    {{__('choose date')}}
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
                    <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-4">
                        <x-floor>
                            <button @click="open = !open" type="button" id="floorButton"
                                class="inline-flex w-40 px-4 py-2 text-sm font-medium text-white  bg-yellowB border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                               
                                    {{__('choose floor')}}
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
                    
                    <div class="relative inline-block text-left">
                        <p 
                            class="inline-flex items-center justify-center py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-md w-56 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 no-underline">
                            Desk
                        </p>
                    </div>
                </div>
        </section>
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
    </main>
    @for ($i = 0; $i < 6; $i++) 
    <div class="modal-wrapper" data-modal-id="{{ $i }}">
      <div class="modal fixed inset-0 hidden">
        <div class="flex modals modal-contents absolute bg-grey p-8 rounded-lg w-72 justify-center items-center flex-col">
          <span class="close absolute -top-6 right-2 text-white cursor-pointer">X</span>
          <p class="text-lg font-semibold absolute top-2 left-3">Confirm Booking</p>
          <div class="bg-white m-3 p-3 w-40 text-center">
            <p class="text-lg font-semibold">Floor#</p> 
            <p class="text-lg font-semibold">Desk#</p>{{-- Include automated floor#-desk# here --}}
            <h6 class="">Date:</h6> {{-- Include automated date here --}}
          </div>
          <button class="custom-a flex items-center justify-center open-second-modal ">Book</button>
        </div>
      </div>
      <div class="second-modal fixed inset-0 hidden">
        <div class="flex modals modal-contents absolute bg-grey p-8 rounded-lg w-72 justify-center items-center flex-col">
          <span class="close absolute -top-6 right-2 text-white cursor-pointer">X</span>
          <p class="text-lg font-semibold mb-4 text-center">Are you sure you want to book a desk?</p>
          <div class="flex flex-row"><button class="custom-a flex items-center justify-center open-third-modal">Yes</button> {{-- Include logic here, dapat masave sa db once click --}}
            <button class="custom-a flex items-center justify-center close">No</button></div>
            
        </div>
      </div>
      <div class="third-modal fixed inset-0 hidden">
        <div class="flex modals modal-contents absolute bg-grey p-8 rounded-lg w-72 justify-center items-center flex-col">
          <span class="close absolute -top-6 right-2 text-white cursor-pointer">X</span>
          <p class="text-lg font-semibold absolute top-2 left-3">Booking <span class="text-yellowB">placed</span></p>
          <div class="bg-white m-3 p-3 w-40 text-center">
            <p class="text-lg font-semibold">Booking#</p> 
            <p class="text-lg font-semibold">Floor#</p> 
            <p class="text-lg font-semibold">Desk#</p>{{-- Include automated floor#-desk# here --}}
            <h6 class="">Date:</h6> {{-- Include automated date here --}}
          </div>
          <a href='{{route('dashboard')}}' class="flex items-center justify-center w-40 bg-yellowB text-white rounded-lg no-underline py-1">Back to Home</a>
            
        </div>
      </div>
     
    </div>
      @endfor
    <script src="{{ asset('js/modal.js') }}"></script>
    @livewireScripts
    @endsection

</x-app-layout>