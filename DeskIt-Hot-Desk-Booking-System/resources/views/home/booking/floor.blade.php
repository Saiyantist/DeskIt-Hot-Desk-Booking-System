@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <main>
        <section class="info-container">
            <div class="first-in">
                <h4>WELCOME TO THE DESKIT OFFICE </h4>
                <h6>The office is specifically crafted to maximize the comfort and productivity of your workday.</h6>
            </div>
        </section>

        <section class="image mb-5">
            <a href="{{route('home.booking.floor1')}}"><img src="/images/floor1.png" class="img-fluid"></a>
            <a href="{{route('home.booking.floor2')}}"><img src="/images/floor2.png" class="img-fluid"></a>
        </section>
    </main>
    @endsection

</x-app-layout>