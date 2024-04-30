@extends('layouts.adminlayout')

<x-app-layout>

    @section('content')
    <div class="flex justify-center items-center mt-16 ml-16">
        <div class=" relative bg h-56 flex justify-start items-center drop-shadow-lg">
             <div class="mt-10  ">
                <!-- Profile Picture -->
                <img class="w-40 h-40 rounded-full border border-gray-500 ml-10" src="/images/anonymous.jpg"
             alt="Profile Picture">
             </div>
               <!-- User's Name -->
            <div class="absolute bottom-0 left-52 m-3">
                <h1 class="text-3xl font-bold">{{ Auth::user()->name }}  
                    {{-- <a href="#" class="text-block px-2 text-2xl" data-toggle="modal" data-target="#ModalCreate"><i
                    class="fa-solid fa-pen-to-square"></i></a> --}}
                </h1>
                <p class="text-lg font-normal">
                    @if(Auth::user()->roles->contains('name', 'employee'))
                    Employee
                    @elseif(Auth::user()->roles->contains('name', 'admin', 'superadmin', 'officemanager'))
                    Administrator
                    @endif
                </p>
            </div>
        </div>

    </div>
    @include("admin.modals.updateProfile")
    <section class="mt-1">
        @livewire('admin-profile')
    </section>
    @endsection
</x-app-layout>