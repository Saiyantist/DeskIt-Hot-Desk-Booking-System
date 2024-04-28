@extends('layouts.adminlayout')

<x-app-layout>
    @section('content')
    <div class="bg h-56 relative z-0">
    </div>
    <!-- Profile Information -->
    <div class="container flex flex-row items-center justify-start absolute top-24 ">
        <!-- Profile Picture -->
        <img class="w-40 h-40 rounded-full border border-gray-500 ml-20" src="/images/anonymous.jpg"
            alt="Profile Picture">

        <!-- User's Name -->
        <div class="flex row m-3 justify-center align-center">
            <h1 class="text-3xl font-bold">{{ Auth::user()->name }}  
                <a href="#" class="text-block px-2 text-2xl" data-toggle="modal" data-target="#ModalCreate"><i
                class="fa-solid fa-pen-to-square"></i></a>
            </h1>
            <p class="text-lg font-normal">
                @if(Auth::user()->roles->contains('name', 'user'))
                Employee
                @elseif(Auth::user()->roles->contains('name', 'admin'))
                Administrator
                @endif</p>
            <p class="text-lg font-normal">{{ Auth::user()->email }}</p>
        </div>
       
    </div>
    @include("admin.modals.updateProfile")
    <section class="mt-1">
        @livewire('admin-profile')
    </section>
    @endsection
</x-app-layout>