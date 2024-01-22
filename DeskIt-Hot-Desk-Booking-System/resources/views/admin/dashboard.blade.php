@extends('layouts.adminlayout')

<x-app-layout>
    @section('content')
    <section class="section2">
        <div class="bg">
            <div class="content">
                <div class="mx-5">
                    <h2>Dashboard</h2>
                    <div>
                        <section class="container">
                            <form method="POST" action="">
                              @csrf
                              <div class="col-12" >
                                <div>
                                  <input  {{--name="datepicker"--}}
                                  type="date" class="form-control bg-warning text-light text-center" id="datepicker"
                                  wire:model="date"
                                  />
                                  
                                </div>
                              </div>
                            </form>
                          </section>
                    </div>
                </div>

                <div>
                    <p class="text">AVAILABLE DESK</p>
                    <p class="text-data">22</p>
                </div>
                <div>
                    <p class="text">BOOKED</p>
                    <p class="text-data">22</p>
                </div>
                <div>
                    <p class="text">NOT AVAILABLE</p>
                    <p class="text-data">28</p>
                </div>
            </div>
        </div>
        <div class="half">
            <div class="floor1">
                <div class="floor-content">
                    <div class="floor">
                        <p class="text">FLOOR 1</p>
                        <p class="text-data">36</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">11</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED</p>
                        <p class="text-data">11</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">NOT AVAILABLE</p>
                        <p class="text-data">14</p>
                    </div>
                </div>
            </div>
            <div class="floor2">
                <div class="floor-content">
                    <div class="floor">
                        <p class="text">FLOOR 2</p>
                        <p class="text-data">36</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">11</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED</p>
                        <p class="text-data">11</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">NOT AVAILABLE</p>
                        <p class="text-data">14</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" mt-44">
        <div class="flex justify-center">
            @livewire('admin-booking')
        </div>
    </section>

    <script src="{{ asset('js/myScript2.js') }}"></script>

    @endsection

</x-app-layout>