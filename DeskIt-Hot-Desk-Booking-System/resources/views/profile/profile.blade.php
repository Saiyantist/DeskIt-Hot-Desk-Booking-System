@extends('layouts.layout')
<x-app-layout>
    @section('content')

    <div class="flex items-center justify-center flex-col">
        <!-- Cover Photo -->
        <div class="bg-yellowA h-64  w-3/4"></div>

        <!-- Profile Information -->
        <div class="container -mt-10 flex flex-row items-center justify-center">
            <!-- Profile Picture -->
            <img class="w-32 h-32 rounded-full border border-gray-500" src="https://via.placeholder.com/150"
                alt="Profile Picture">

            <!-- User's Name -->
           <div class=" mt-5 mx-3">
                <h1 class="text-3xl font-bold">name</h1>
                <p class=" text-lg font-normal">position</p>
           </div>
    </div>
    <div class="border h-full  w-3/4 mt-48">
        <h1 class="flex justify-center">insert table</h1>
    </div>
    @endsection
</x-app-layout>