@extends('layouts.layout')

<x-app-layout>
    @section('content')
    <main>
        <section class="d-flex justify-center mt-28 ml-10">
            <div class="first-in">
                <h4>WELCOME TO THE FLOOR 1 </h4>
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
                            @include('layouts.calendar')
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
                        <a href="{{route('home.booking.floor2')}}" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 hover:text-gray-900 no-underline" role="menuitem">Floor 2</a>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
        <section>
            <h1 class=" mt-52 d-flex justify-center">Insert desks here!!</h1>
        </section>
    </main>
    @endsection
</x-app-layout>
