@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <main>
        <section class="info-container">
            <div class="first-in">
                <h4>WELCOME TO THE FLOOR 2 </h4>
                <h6>Choose the perfect desk for optimal productivity and comfort, enhancing your work experience.</h6>
            </div>
            <div class="m-3 align-self-center">
                <div x-data="{ open: false }" @click.away="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white  bg-yellowB border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      Choose date
                      <div class="ml-1 ">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill="white" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    </button>
                    <div x-show="open" class="absolute right-0 z-10 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md">
                      <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="calendar-image">
                            @include_once('layouts.calendar')
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div x-data="{ open: false }" @click.away="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white  bg-yellowB border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      Choose floor
                      <div class="ml-1 ">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill="white" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    </button>
                    <div x-show="open" class="absolute right-0 z-10 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md">
                      <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="{{route('home.booking.floor1')}}" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 hover:text-gray-900 no-underline" role="menuitem">Floor 1</a>
                        
                      </div>
                    </div>
                  </div>
            </div>
        </section>
        <section class="d-flex justify-center m-5">
          <div class="h-full bg-gray desk">
            <div class="bg-gray desk m-4 flex flex-row relative justify-center">
              <div class="absolute bottom-0 left-0">
                <img src="{{ asset('images/door.svg') }}" class="flex w-16 my-1" alt="SVG Image">
              </div>
              <div class="mr-8">
                <div class="flex items-start ">
                  <div class="b-chair m-3">
                    @for ($i = 0; $i < 4; $i++) <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/left-chair.svg') }}" class="flex w-16 my-1" alt="SVG Image"></a>
                      @endfor
                  </div>
                </div>
              </div>
    
              <div class="mx-2">
                <div class="flex justify-center items-start">
                  <div class="b-chair m-3 mb-5">
                    @for ($i = 0; $i < 6; $i++) <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-16" alt="SVG Image"></a>
                      @endfor
                  </div>
                </div>
                <div class="flex justify-center items-center">
                  <div class="b-chair m-3">
                    @for ($i = 0; $i < 6; $i++) <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-16" alt="SVG Image"></a>
                      @endfor
                  </div>
                </div>
                <div class="flex justify-center items-center">
                  <div class="b-chair mb-5">
                    @for ($i = 0; $i < 6; $i++) <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-16" alt="SVG Image"></a>
                      @endfor
                  </div>
                </div>
                <div class="flex justify-center items-end">
                  <div class="b-chair m-3">
                    @for ($i = 0; $i < 6; $i++) <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-16" alt="SVG Image"></a>
                      @endfor
                  </div>
                </div>
              </div>
              <div class=" ml-20">
                @for ($i = 0; $i < 2; $i++) <div class="flex flex-col justify-center mt-2">
                  <div class="b-chair m-3 flex flex-row items-end">
                    <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img src="{{ asset('images/left-cubic.svg') }}"
                        class=" flex w-16" alt="SVG Image"></a>
                    <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img src="{{ asset('images/top-cubic.svg') }}"
                        class=" flex h-16" alt="SVG Image"></a>
                  </div>
                  <div class="b-chair flex -m-4 flex-row justify-start items-start">
                    <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-16" alt="SVG Image"></a>
                    <a href="" class="modalTrigger" data-modal-id="{{ $i }}"><img
                        src="{{ asset('images/right-cubic.svg') }}" class=" flex w-16" alt="SVG Image"></a>
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
            <p class="text-lg font-semibold mb-4">Floor# - Desk#</p> {{-- Include automated floor#-desk# here --}}
            <h6>Date:</h6> {{-- Include automated date here --}}
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
            <p class="text-lg font-semibold">Booking# successfully placed</p> {{-- Include automated booking# here --}}
            <h6>Date:</h6> {{-- Include automated date here --}}
            <p class="text-lg font-semibold">Desk#</p> {{-- Include automated desk here --}}
            <h6>by: {{ Auth::user()->name }}</h6>
            <a href='{{route('dashboard')}}' class="flex items-center justify-center w-40 bg-yellowB text-white rounded-lg no-underline py-1">Back to Home</a>
              
          </div>
        </div>
       
      </div>
        @endfor
    
        <script src="{{ asset('js/modal.js') }}"></script>
        </section>
    </main>
    @endsection

</x-app-layout>