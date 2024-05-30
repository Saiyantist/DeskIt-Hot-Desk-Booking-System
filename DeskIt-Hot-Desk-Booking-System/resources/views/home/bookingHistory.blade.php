@extends('layouts.layout')


<x-app-layout>
    
    @section('content')
    <div class=" ml-40 mt-16 rounded-lg">
        <div class="p-2">
            <p>My Bookings</p>
            <livewire:user-dashboard-booking/> 
        </div>
        
    </div>

    @endsection
</x-app-layout>