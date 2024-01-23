@extends('layouts.adminlayout')
<x-app-layout>

    <div class="py-12 mt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border ">
                <div class="max-w-xl">
                    <!-- User Information -->
                    <h5>Name: {{ Auth::user()->name }}</h5>
                    <h5>Email: {{ Auth::user()->email }}</h5>
                    <h5>Gender: {{ Auth::user()->gender }}</h5>
                    <h5>Birthday: {{ Auth::user()->birthday }}</h5>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border">
                <div class="max-w-xl ">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
