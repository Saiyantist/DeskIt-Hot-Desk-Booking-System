@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <section class="bg-pink">
        <div class="mt-16" >
            <h2 class="pl-32 pt-16">Good Morning,
                <span class=" text-yellowB"> {{Auth::user()->name}}</span>
            </h2>
            <h6 class="pl-32 font-light text-lg">Let's do the best today!</h6>
        </div>
        <div>
            
        </div>
        <div class="ml-24 mt-4">
            <div class="myBook-container flex flex-row justify-evenly">
                <div>
                    <h6 class="font-semibold">TODAY'S BOOKING</h6>
                    <div class="bg-white p-3 rounded-lg drop-shadow-lg mt-3">
                        @if($todaysBooking)
                            <h6 class="flex">
                                <img src="{{ asset('images/calendar.svg') }}" class="pr-2">
                                {{ $todaysBooking->booking_date }} 
                            </h6>
                            <h6 class="flex">
                                <img src="{{ asset('images/location.svg') }}" class="pr-2">
                                Floor {{ $todaysBooking->floor }} - Desk {{ $todaysBooking->desk->desk_num }} 
                            </h6>
                            <h6 class="flex">
                                <img src="{{ asset('images/clock.svg') }}" class="pr-2">
                                {{ $todaysBooking->booking_date }} 
                            </h6>
                        @else
                            <p>No booking for today</p> 
                        @endif
                    </div>  
                </div>
                <div class="w-3/4 h-[93vh] ">
                    <div id="calendar"></div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="bg-pink flex justify-center items-center"> 
        <div class=" ml-24 p-2 flex flex-col bg-white rounded-lg w-[90%] drop-shadow-lg"> 
            <div class="flex justify-between p-2">
                <h6>Upcoming Bookings</h6>
                <a class="no-underline text-block" wire:navigate href="{{ route('booking-history') }}">Bookings <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <table class="text-center">
                <thead class="bg-gray">
                    <tr>
                        <th class="w-1/12">ID</th>
                        <th class="w-1/12">Name</th>
                        <th class="w-1/12">Email</th>
                        <th class="w-1/12">Floor #</th>
                        <th class="w-1/12">Desk #</th>
                        <th class="w-1/12">Date</th>
                        <!-- <th class="w-1/12">Booked By</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($upcomingBookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->user->email }}</td>
                        <td>{{ $booking->floor }}</td>
                        <td>{{ $booking->desk->desk_num }}</td>
                        <td>{{ $booking->booking_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <style>
        a.fc-col-header-cell-cushion {
            color: black;
            text-decoration: none;
        }

        a.fc-daygrid-day-number {
            color: black;
            text-decoration: none;
        }

        td.fc-daygrid-day {
            height: 11.9vh;
        }
        
        div.fc-event-main {
        background-color: #F9F6F6;
        color: black;
        border: none;
        border-left: 5px solid #FBB503;
        padding: 3px;
       }
       div.fc-daygrid {
        background-color: white;
       }

       div#calendar {
        background-color: white;
        height: 15vh;
        border-radius: 10px;
       }

       div.fc-header-toolbar {
        padding: 15px 15px 0 15px;
       }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var today = new Date();
            var currentMonth = today.getMonth() + 1;

            var startDate = today.getFullYear() + '-' + currentMonth.toString().padStart(2, '0') + '-01';
            var endDate = today.getFullYear() + '-' + (currentMonth + 2).toString().padStart(2, '0') + '-01';

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                validRange: {
                    start: startDate,
                    end: endDate
                },
                
                events: "{{ route('user.bookings', auth()->id()) }}",
                eventClick: function (info) {
                    // Handle event click if needed
                }
            });
            calendar.render();

        });
    </script>
    
    @endpush
    @endsection
</x-app-layout>
