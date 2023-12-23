@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <div class="head-uHome">
        
        <img src="../images/head-uHome.png" class="img-fluid">
        <h1>Welcome! Let's find the right workspace for you.</h1>
        <a class="book" href="{{route('home.book')}}">Book a desk</a>
    </div>
    <section>
        <div class="myBook-container">
            <div class="my-bookings">
                <h5>My bookings</h5>
            </div>

            <div class="calendar-image">
                @include('layouts.calendar')

                <?= '<div class="date-my">
                    <i class="fa-solid fa-less-than"></i>
                    <h2>DECEMBER 2023</h2>
                    <i class="fa-solid fa-greater-than"></i>
                </div>';
                ?>

                <?= draw_calendar(12, 2023); ?>
                
            </div>
        </div>
    </section>

    @endsection

</x-app-layout>