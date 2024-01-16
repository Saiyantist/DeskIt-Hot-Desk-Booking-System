{{-- should be disregard --}}
@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <main>
        <section>
            <div class="myBook-container custom-border">
                
                <div class="calendar-image">
                    <p class="fs-5 font-light mb-10">Kindly choose your preferred date from the available options to secure your desk booking and ensure a seamless and timely experience.</p>
                    {{-- @include('layouts.calendar') --}}
                    {{-- ALISIN KAPAG NABALIW ANG CALENDAR --}}
                    

                    {{-- Dynamic
                        Replace <h2> content with $CurrentMonth $CurrentYear
                                                    ^^ wala pa nito ^^    
                    --}}

                    <?= '<div class="date-my">
                        <i class="fa-solid fa-less-than"></i>
                        <h2>DECEMBER 2023</h2>
                        <i class="fa-solid fa-greater-than"></i>
                    </div>';
                    ?>

                    {{-- <?= draw_calendar(12, 2023); ?> --}}
                    {{-- ALISIN KAPAG NABALIW ANG CALENDAR --}}


                    {{-- Insert code, for getting booking_date from the Calendar UI  --}}



                    <div class="custom-div-a">
                        <a class="custom-a fs-5 w-100" href="{{route('book')}}">Next</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

</x-app-layout>