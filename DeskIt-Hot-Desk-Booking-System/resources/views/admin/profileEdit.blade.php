@extends('layouts.adminlayout')
<x-app-layout>
    <div class="flex items-center justify-center flex-col">
        <!-- Cover Photo -->

        <div class="py-12 mt-16 w-1/2 text-lg">
               
                <div class="p-4 bg-white sm:rounded-lg border mb-10">
                    <p class=" font-semibold ml-2 text-center my-2">PROFILE INFORMATION</p>
                    <div class="max-w-xl py-2">
                        <!-- User Information -->
                        <p class="text-lg font-semibold ml-2">Name</p>
                        <div class="border  p-2 rounded-lg"> {{ Auth::user()->name }}</div>
                    </div>
                    <div class="max-w-xl py-2">
                        <!-- User Information -->
                        <p class="text-lg font-semibold ml-2">Email</p>
                        <div class="border p-2 rounded-lg"> {{ Auth::user()->email }}</div>
                    </div>
                    <div class="max-w-xl py-2">
                        <!-- User Information -->
                        <p class="text-lg font-semibold ml-2">Gender</p>
                        <div class="border p-2 rounded-lg"> {{ Auth::user()->gender }}</div>
                    </div>
                    <div class="max-w-xl py-2">
                        <!-- User Information -->
                        <p class="text-lg font-semibold ml-2">Birthday</p>
                        <div class="border p-2 rounded-lg"> {{ Auth::user()->birthday }}</div>
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg border">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

           

        </div>
    </div>


    </div>
</x-app-layout>