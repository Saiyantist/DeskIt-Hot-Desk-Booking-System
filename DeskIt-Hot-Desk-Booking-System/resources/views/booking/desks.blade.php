@extends('layouts.layout')

<x-app-layout>
    @section('content')
  

    {{-- Booking  Controllers --}}
    <div class="flex justify-end items-center mt-24 mr-24">

        {{-- Date Picker --}}
        <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-2">
            <x-calendar>
            </x-calendar>
        </div>


        {{-- Floor Chooser --}}
        <div x-data="{ open: false }" @click.away="open = false" class="relative text-center my-2">
            <x-floor>
            </x-floor>
        </div>

        {{-- See Available --}}
        <div class="mr-16">
            {{-- Refresh the Desk Map --}}
            <a href=""
                class="inline-flex items-center justify-center py-2 text-sm font-medium text-white bg-yellowB border border-gray-300 rounded-full w-40 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 no-underline my-3">See
                Available Desks
            </a>
        </div>

    </div>
    
    <main class="flex flex-row justify-center">
    
        {{-- Side Panel Section --}}
        <section>
            <div>
                {{-- Side Panel Header --}}
                <div class="first-in">
                    <h4>CHOOSE A DESK</h4>
                    <h6>This PAGE should show the Desk Availabilities na (green, red, gray)
                    </h6>
                </div>
    
                {{-- Side Panel Body --}}
                <div class="book text-center">
                    <p class="book-desk text-lg font-semibold py-2">Book a Desk</p>
                    <div class="pb-2">
                        <p class="text-lg font-semibold text-left px-4">Date: </h6>
                        <div class="flex flex-row justify-content-between px-4">
                            <p class="text-lg font-semibold text-left">Floor# </p>
                            <p class="text-lg font-semibold text-left mr-8">Desk# </p>
                        </div>
                    </div>
                    <button class="justify-center items-center bg-yellowB rounded-xl w-28 h-10 p-1 mb-3 text-white">Book</button>
                    {{-- Back-end --}}
                </div>
    
            </div>
        </section>
        
        {{-- Desk Map --}}
        <section class="d-flex items-center justify-center m-3">
            <div class=" w-12/12 h-100 bg-gray desk">
                <div class="bg-gray desk m-4 flex flex-row relative justify-center">

                    <div class="absolute bottom-0 left-0">
                        <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                    </div>

                    {{-- LEFT Column --}}
                    <div class="mr-8">
                        <div class="flex items-start ">
                            <div class="b-chair m-3">

                                <div id="101" class="flex w-14 my-1">
                                    <a class="modalTrigger" data-modal-id='101'><img
                                            src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="102" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="103" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                                <div id="104" class="flex w-14 my-1">
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- MIDDLE --}}
                    <div class="flex flex-column justify-content-between mx-2">

                        {{-- First Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3 mb-5">

                                <div id="105">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="106">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="107">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="108">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="109">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="110">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Second Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3">

                                <div id="111">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="112">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="113">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="114">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="115">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="116">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Third Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3 mb-5">

                                <div id="105">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="106">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="107">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="108">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="109">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="110">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>

                        {{-- Fourth Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3">

                                <div id="117">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="118">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="119">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="120">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="121">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div>

                                <div id="122">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class=" inline-flex h-14"></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- RIGHT Column --}}
                    <div class="flex flex-column justify-content-between ml-12 mr-5 mt-3">

                        {{-- Upper Desks --}}
                        <div>
                            <div class="b-chair m-3 flex flex-row items-end">

                                <div id="129">
                                    <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="130">
                                    <a><img src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>
                            </div>

                            <div class="b-chair flex -m-4 flex-row justify-start items-start">

                                <div id="132">
                                    <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="131">
                                    <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>
                            </div>
                        </div>

                        {{-- Lower Desks--}}
                        <div class="my-12">
                            <div class="b-chair m-3 flex flex-row items-end">

                                <div id="133">
                                    <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="134">
                                    <a><img src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                            </div>

                            <div class="b-chair flex -m-4 flex-row justify-start items-start">

                                <div id="136">
                                    <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                            alt="SVG Image"></a>
                                </div>

                                <div id="135">
                                    <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                            alt="SVG Image"></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>
    
    </main>


    @endsection
</x-app-layout>