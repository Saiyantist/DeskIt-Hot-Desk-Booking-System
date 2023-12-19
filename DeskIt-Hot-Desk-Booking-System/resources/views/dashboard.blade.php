@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <div class="head-uHome">
        
        <img src="../images/head-uHome.png" class="img-fluid">
        <h1>Welcome! Let's find the right workspace for you.</h1>
        <a class="book" href="{{route('home.booking.calendar')}}">Book a desk</a>
    </div>
    <section>
        <div class="myBook-container">
            <div class="my-bookings">
                <h5>My bookings</h5>
            </div>

            <div class="calendar-image">
                @include('layouts.calendar')
            </div>
        </div>
    </section>
    
    @endsection

</x-app-layout>