@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <section class="bg-pink">
        <div class="mt-16" >
            <h2 class="pl-32 pt-12">Good Morning,
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
                            <div class="text-base">No booking for today</div> 
                        @endif
                    </div>  
                </div>
                <div class="w-3/4 h-max">
                    <div id="calendar"></div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="bg-pink flex justify-center items-center"> 
        <div class="m-10 ml-24 p-2 flex flex-col bg-white rounded-lg w-[70%] drop-shadow-lg text-lg"> 
            <div class="flex justify-between p-2">
                <p class="text-lg">Upcoming Bookings</p>
                <a class="no-underline text-block text-lg" wire:navigate href="{{ route('booking-history') }}">Bookings <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <table class="text-center">
                <thead class="bg-gray">
                    <tr>
                        <th class="w-1/12">ID</th>
                        <th class="w-1/12">Floor #</th>
                        <th class="w-1/12">Desk #</th>
                        <th class="w-1/12">Date</th>
                        <th class="w-1/12">Status</th>
                        <!-- <th class="w-1/12">Booked By</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($upcomingBookings as $booking)
                    <tr >
                        <td class="p-2">{{ $booking->id }}</td>
                        <td class="p-2">{{ $booking->floor }}</td>
                        <td class="p-2">{{ $booking->desk->desk_num }}</td>
                        <td class="p-2">{{ $booking->booking_date }}</td>
                        <td class="p-2">{{ $booking->status }}</td>
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
/* 
        td.fc-daygrid-day {
            height: 5vh;
        } */
          
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
        width: 67vw;
        border-radius: 10px;
        font-size:1rem;
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
                height: 'max-content',
                validRange: {
                    start: startDate,
                    end: endDate
                },
                events: "{{ route('user.bookings', auth()->id()) }}",
                eventClick: function (info) {
                    // Handle event click if needed
                },
                eventContent: function(arg) {
                    let title = document.createElement('div');
                    title.innerHTML = arg.event.title;

                    let statusTitle = document.createElement('div');
                    statusTitle.innerHTML = arg.event.extendedProps.statusTitle;

                    let arrayOfDomNodes = [ title, statusTitle ];
                    return { domNodes: arrayOfDomNodes };
                }
            });
            calendar.render();
        });
    </script>

    
    @endpush
    @endsection
</x-app-layout>