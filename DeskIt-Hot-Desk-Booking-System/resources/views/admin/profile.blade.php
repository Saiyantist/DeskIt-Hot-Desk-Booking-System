@extends('layouts.adminlayout')

<x-app-layout>

    @section('content')
   <section id="sect">
        <div class="flex justify-center items-center mt-16 ml-35">
            <div class="bg-white ml-20 mt-10 w-11/12 h-56 flex justify-start items-center drop-shadow-lg">

                <div class="flex">
                    <!-- Profile Picture -->
                    <img class="w-40 h-40 rounded-full border border-gray-500 ml-10" src="/images/anonymous.jpg"
                        alt="Profile Picture">
                    <div class="flex self-end -ml-10 mr-5">
                        <a wire:navigate href="#"><img src="{{ asset('images/cam.svg') }}"></a>
                    </div>
                </div>

                <div class="m-3 pb-4 flex flex-col self-end">
                    
                <!-- User's Name -->
                    <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>

                    <!-- User's Role -->
                    <div>
                        @if(Auth::user()->roles->contains('name', 'employee'))
                        <div class="flex">
                            <img src="{{ asset('images/employee-profile.svg') }}">
                            <div class="ml-2 text-lg font-normal">Employee</div>
                        </div>

                        @elseif(Auth::user()->roles->whereNotIn('name', 'employee')->isNotEmpty())
                        <div class="flex">
                            <img src="{{ asset('images/administrator.svg') }}" >
                            <div class="ml-2 text-lg font-normal">Administrator</div>
                        </div>

                        @endif
                    </div>
                </div>

            </div>
        </div>
   </section>

    <section class="mt-1">
        @livewire('admin-profile')
    </section>
    @endsection
</x-app-layout>