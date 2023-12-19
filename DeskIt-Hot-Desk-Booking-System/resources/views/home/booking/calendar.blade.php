@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <main>
        <section>
            <div class="myBook-container custom-border">
                
                <div class="calendar-image">
                    <p class="fs-5 font-light mb-10">Kindly choose your preferred date from the available options to secure your desk booking and ensure a seamless and timely experience.</p>
                    @include('layouts.calendar')
                    <div class="custom-div-a">
                        <a class="custom-a fs-5 w-100" href="{{route('home.booking.floor')}}">Next</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

</x-app-layout>