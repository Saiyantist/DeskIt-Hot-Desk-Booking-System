@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <div class="head-uHome">
        <img src="../images/head-uHome.png" class="img-fluid">
        <h1>Welcome! Let's find the right workspace for you.</h1>
        <a class="book" href="{{ route('book') }}">Book a desk</a>
    </div>
    <section>
        <div class="myBook-container">
            <div class="my-bookings">
                <h5>My bookings</h5>
            </div>

            <div class="booking-table">
                <div>
                    @if($user->bookings->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Booking Date</th>
                                    <th>Status</th>
                                    <th>Desk#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->status }}</td>
                                        <td>{{ $booking->desk_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No bookings available.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-app-layout>
