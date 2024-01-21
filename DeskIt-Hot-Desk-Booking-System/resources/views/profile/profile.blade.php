@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <div class="flex items-center justify-center flex-col">
        <!-- Cover Photo -->
        <div class="bg-yellowA h-64 w-5/6"></div>

        <!-- Profile Information -->
        <div class="container -mt-16 flex flex-row  items-center justify-start">
            <!-- Profile Picture -->
            <img class="w-40 h-40 rounded-full border border-gray-500 ml-20" src="images/anonymous.jpg"
                alt="Profile Picture">

            <!-- User's Name -->
           <div class=" mt-5 mx-3">
                <h1 class="text-3xl font-bold">{{ Auth::user()->name }} <a href="{{route('profile.edit')}}" class=" text-base text-block text-center px-2"><i class="fa-regular fa-pen-to-square"></i></a></h1>
                <p class=" text-lg font-normal">{{ Auth::user()->position }}</p>
           </div>
    </div>
    <div class="mt-3">
        @livewire('table')
    </div>
    @endsection
</x-app-layout>