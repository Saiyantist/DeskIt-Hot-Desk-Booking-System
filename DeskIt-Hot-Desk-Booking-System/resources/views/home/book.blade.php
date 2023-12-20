@extends('layouts.layout')
<x-app-layout>
    @section('content')

    <main class="flex flex-row justify-center items-center mt-28">
        <section>
            <div class="flex justify-center items-center flex-col m-3">
                <div class="first-in">
                    <h4>WELCOME TO THE DESKIT OFFICE</h4>
                    <h6>The office is specifically crafted to maximize the comfort and productivity of your workday.
                    </h6>
                </div>
                @livewire('booking')
            </div>
        </section>
        <section class="d-flex items-center justify-center m-3">
            <div class=" w-12/12 h-max bg-gray desk">
                <div class="bg-gray desk m-4 flex flex-row relative justify-center">
                    <div class="absolute bottom-0 left-0">
                        <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                    </div>
                    <div class="mr-8">
                        <div class="flex items-start ">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 4; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/left-chair.svg') }}" class="flex w-14 my-1"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                    </div>

                    <div class="mx-2">
                        <div class="flex justify-center items-start">
                            <div class="b-chair m-3 mb-5">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="b-chair mb-5">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="flex justify-center items-end">
                            <div class="b-chair m-3">
                                @for ($i = 0; $i < 6; $i++) <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-chair.svg') }}" class=" inline-flex h-14"
                                        alt="SVG Image"></a>
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <div class=" ml-20">
                        @for ($i = 0; $i < 2; $i++) <div class="flex flex-col justify-center mt-2">
                            <div class="b-chair m-3 flex flex-row items-end">
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14"
                                        alt="SVG Image"></a>
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/top-cubic.svg') }}" class=" flex h-14"
                                        alt="SVG Image"></a>
                            </div>
                            <div class="b-chair flex -m-4 flex-row justify-start items-start">
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14"
                                        alt="SVG Image"></a>
                                <a class="modalTrigger" data-modal-id="{{ $i }}"><img
                                        src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14"
                                        alt="SVG Image"></a>
                            </div>
                            @if ($i < 1) <span class=" my-4"></span>
                                @endif
                        @endfor
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    @livewireScripts
    @endsection

</x-app-layout>