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
           <div class="mx-3">
                <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
                <p class=" text-lg font-normal"> Developer </p>
           </div>
           <a href="{{route('profile.edit')}}" class=" text-block px-2 absolute right-10 text-2xl"><i class="fa-regular fa-pen-to-square"></i></a>
        </div>
        <div>
            
        </div>
    @endsection

</x-app-layout>
