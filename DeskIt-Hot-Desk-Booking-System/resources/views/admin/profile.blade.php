@extends('layouts.adminlayout')

<x-app-layout>
    @section('content')
    <div class="bg h-64 relative z-0">
    </div>
    <!-- Profile Information -->
    <div class="container flex flex-row  items-center justify-start absolute top-24">
        <!-- Profile Picture -->
        <img class="w-40 h-40 rounded-full border border-gray-500 ml-20" src="/images/anonymous.jpg"
            alt="Profile Picture">

        <!-- User's Name -->
        <div class="flex row m-3 justify-center align-center">
            <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
            <p class="text-lg font-normal">
                @if(Auth::user()->roles->contains('name', 'user'))
                Employee
                @elseif(Auth::user()->roles->contains('name', 'admin'))
                Administrator
                @endif</p>
            <p class="text-lg font-normal">{{ Auth::user()->email }}</p>
        </div>
        <a href="{{ route('profile.edit') }}" class="text-block px-2 absolute right-40 text-2xl"><i
                class="fa-regular fa-pen-to-square"></i></a>
    </div>

    <section class="mt-20">
        @livewire('admin-profile')
    </section>
    @endsection
</x-app-layout>