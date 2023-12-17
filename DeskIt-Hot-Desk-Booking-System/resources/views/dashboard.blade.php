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
    <section class="second-row">
        <div class="row-container">
            <div class="first-info">
                <h4>REAP THE BENEFITS OF EASY, FAST, AND AFFORDABLE</h4>
                <p class="uhome">Room booking software for hybrid workspace management</p>
                <h6>Let’s you connect with colleagues in real-time and enjoy a seamless meeting room booking experience.
                    See instant availability of desks and rooms, and reserve your space wherever and whenver you are.
                </h6>
            </div>
            <div class="second-image">
                <img src="../images/image1.png" class="img-fluid">
            </div>
        </div>

    </section>
    @endsection

</x-app-layout>