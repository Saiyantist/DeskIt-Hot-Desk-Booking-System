@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <div class="head-uHome">

        <img src="../images/head-uHome.png" class="img-fluid">
        <h1>Welcome! Let's find the right workspace for you.</h1>
        <a class="book" href="{{route('book')}}">Book a desk</a>
    </div>
    <section>
        <div class=" ml-44 mt-16 ">
            <div class="myBook-container">
                <div class="my-bookings">
                    <h5 class=" text-white">My bookings</h5>
                </div>

                <div class="flex w-3/4 h-screen bg-grey p-4 absolute">
                    <div id="calendar"></div>

                </div>
            </div>
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

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var today = new Date();
            var currentMonth = today.getMonth() + 1; // Months are zero-based, so add 1

            // Calculate the start and end dates based on the current month
            var startDate = today.getFullYear() + '-' + currentMonth.toString().padStart(2, '0') + '-01';
            var endDate = today.getFullYear() + '-' + (currentMonth + 2).toString().padStart(2, '0') + '-01';

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                validRange: {
                    start: startDate,
                    end: endDate
            },
                events: @json($events),
            });
            calendar.render();
        });
    </script>
    @endpush
    @endsection

</x-app-layout>