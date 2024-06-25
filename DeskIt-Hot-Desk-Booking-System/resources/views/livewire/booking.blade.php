<div class="flex flex-col container mt-16">

    @include("admin.modals.updatedBooking")


    <main class="flex gap-4 py-8 justify-center items-center">
       
        <section class="flex flex-col">
            <div class="h-auto border shadow-lg w-96 px-4 py-4 ml-10 rounded-xl">

                <p class="text-2xl py-1 text-center text-slate-600 font-mono italic rounded-lg drop-shadow-md ">Book a Desk</p>
    
                <div class="flex">
                    <div class=" w-1/6 pr-2">
                        <p class="text-base text-left">Floor:
                            <span class="text-base bg-white border shadow-sm border-slate-300 spanlaceholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md focus:ring-1 h-10 flex items-center justify-center">{{ $floor }}</span>
                        </p>
                    </div>
                    <div class=" w-1/2 pr-2">
                        <p class="text-base text-left">Date:
                           <span class="text-base bg-white border shadow-sm border-slate-300 spanlaceholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md focus:ring-1 h-10 flex items-center justify-center">{{ $date }}</span>
                       </p>
                    </div>
                    <div class=" w-9/12 pr-2">
                        <p class="text-base text-left">Time:
                              <span class="text-base bg-white border shadow-sm border-slate-300 spanlaceholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md focus:ring-1 h-10 flex items-center justify-center">{{ $time }}</span>
                       </p>
                    </div>
                </div>
                
                <div class="flex flex-col">
                   
                    <div class="pr-2 flex flex-row items-center">
                        <div>
                            <p class="text-base text-left">Desk#: </p>
                        </div>
                        <div class="ml-2 w-1/2">
                            <p class="text-base bg-white border shadow-sm border-slate-300 spanlaceholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md focus:ring-1 h-10 flex items-center justify-center">{{ $selectedDesk }}</p>
                        </div>
                    </div>
                    
                    @if($selectedDeskIndex === null)
                        <div class="flex flex-col">
                            <div class="w-full">
                                <img src="{{ asset('images/chooseimg.svg') }}">
                            </div>
                            <div class="pt-2 opacity-55">
                                <div class ="text-sm font-semibold pl-2 mt-2">Amenities: </div>
                                <div class="flex flex-row">
                                    <ul class="text-xs">
                                        <li class="list-disc"> Choose a desk</li>
                                        <li class="list-disc"> Choose a desk</li>
                                        <li class="list-disc"> Choose a desk</li>
                                        <li class="list-disc"> Choose a desk</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($selectedDeskIndex !== null)
                    <div class="flex flex-col">
                        <div class="w-full">
                            @if(($selectedDeskIndex >= 0 && $selectedDeskIndex < 4) || ($selectedDeskIndex >= 36 && $selectedDeskIndex <= 39))
                                <img src="{{ asset('images/deskA.svg') }}">
                            @elseif(($selectedDeskIndex >= 4 && $selectedDeskIndex < 10) || ($selectedDeskIndex >= 40 && $selectedDeskIndex < 46))
                                <img src="{{ asset('images/deskB.svg') }}">
                            @elseif(($selectedDeskIndex >= 10 && $selectedDeskIndex < 16) || ($selectedDeskIndex >= 46 && $selectedDeskIndex < 52))
                                <img src="{{ asset('images/deskC.svg') }}">
                            @elseif(($selectedDeskIndex >= 16 && $selectedDeskIndex < 22) || ($selectedDeskIndex >= 52 && $selectedDeskIndex < 58))
                                <img src="{{ asset('images/deskD.svg') }}">
                            @elseif(($selectedDeskIndex >= 22 && $selectedDeskIndex < 28) || ($selectedDeskIndex >= 58 && $selectedDeskIndex < 64))
                                <img src="{{ asset('images/deskE.svg') }}">
                            @elseif(($selectedDeskIndex >= 28 && $selectedDeskIndex < 36) || ($selectedDeskIndex >= 64 && $selectedDeskIndex < 72))
                                <img src="{{ asset('images/deskF.svg') }}">
                            @endif
                        </div>
                        <div class="pt-2">
                            <div class ="text-sm font-semibold pl-2 mt-2">Amenities: </div>
                            <div class="flex flex-row">
                                <ul class="text-xs">
                                    @foreach($desks[$selectedDeskIndex]->amenities as $amenity)
                                        <li class="list-disc">{{ $amenity }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
    
                <div class="flex items-center justify-center">
                    {{-- Booking Button --}}
                    <button class="book justify-center bg-amber-400 hover:bg-amber-500 text-white font-bold tracking-wide rounded-xl px-20 py-1 mt-2 text-lg"
                        wire:click='validateBooking'
                        wire:submit>
                        Book
                    </button>
                </div>
            </div>
        </section>
        {{-- Main Content --}}
        <section class="flex flex-col p-4 pt-0 h-fit bg-yellowA rounded-2 relative">

            {{-- Booking  Controllers --}}
            <div class="flex flex-row py-3 self-start">

                 {{-- Floor Chooser --}}
                 <div x-data="{ open: false }" @click.away="open = false" class="floor text-center mr-4">
                    <form method="POST" action="">
                    @csrf
                        <select class="form-select bg-warning text-center text-black uppercase floors"
                        wire:model.live="floor" 
                        wire:change='refreshMap'
                        >
                        <option value="1" selected>Floor 1</option>
                        <option value="2">Floor 2</option>
                        </select>
                    </form>
                </div>

                {{-- Date Picker --}}
                <div x-data="{ open: false }" @click.away="open = false" class="date text-center mr-4">
                    <form method="POST" action="">
                    @csrf
                        <div class="col-12">
                            <div class="input-group date"
                                {{-- wire:click='refreshMap' --}}
                                >
                                <input id="datepicker"
                                type="date" class="form-control bg-warning text-center text-black uppercase"
                                wire:model.live="date"
                                wire:change='refreshMap'
                                min= {{ $min }}
                                max= {{ $max }}
                                />
                            </div>
                        </div>
                    </form>
                </div>

                 {{-- Time Picker --}}
                 <div x-data="{ open: false }" @click.away="open = false" class="stime text-center mr-4">
                    <form method="POST" action="">
                    @csrf
                    <div class="col-12">
                        <div class="input-group time">
                            <select class="form-control bg-warning text-center text-black uppercase" name="time" wire:model.live="time" wire:change='refreshMap'>
                                <option value="">time</option>
                                <option value="8:00 am - 7:00 pm">8:00 AM - 7:00 PM</option>
                                <option value="7:00 pm - 3:00 am">7:00 PM - 3:00 AM</option>
                            </select>
                        </div>
                    </div>
                    </form>
                </div>

                {{-- Onboarding Guide --}}
                <div class="absolute right-5">
                    <a class="helpIcon cursor-pointer">
                        <img src="{{ asset('images/help.svg') }}" class="w-8 h-8">
                        <script>startIntro();</script>
                    </a>
                </div>
            </div>

            {{-- Desk Map --}}
            <div class=" w-12/12 h-fit bg-gray desk">
                <div class="bg-gray desk m-4 flex flex-row relative justify-center">

                    <div class="absolute bottom-0 left-0">
                        <img src="{{ asset('images/door.svg') }}" class="flex w-14 my-1" alt="SVG Image">
                    </div>

                    {{-- LEFT Column --}}
                    <div class="mr-8">
                        <div class="flex items-start">
                            <div class="b-chair m-3">
                        
                            {{-- LOGICS --}}

                            @if($floor == 1)

                                {{-- Iterator --}}
                                @for($i = 0; $i < 4; $i++)

                                {{-- Desk --}}
                                <div id={{ $desks[$i]->desk_num}} class="flex w-16" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})" >

                                    {{-- Image --}}
                                    <a><img class="" src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"/></a>
                                
                                    {{-- Label and Circle --}}
                                    <div class="position-absolute"> 
                                        <div class='ml-3 mt-4'>

                                            {{-- Availability Circle --}}
                                            @if($floor && $date && $time)
                                                @if($desks[$i]->status == 'not_available')
                                                    <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                
                                                    @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                        <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>

                                                    @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                        <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                @endif
                                                @else
                                                    <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                            @endif

                                            {{-- Dynamic Desk Number --}}
                                            <p class="m-0 mt-1 text-left text-sm">{{ $desks[$i]->desk_num }}</p>

                                        </div>
                                    </div>

                                </div>
                                @endfor
                                
                            @elseif($floor == 2)

                                {{-- Iterator --}}
                                @for($i = 36; $i <= 39; $i++)

                                {{-- Desk --}}
                                <div id={{ $desks[$i]->desk_num}} class="flex w-16" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})" >

                                    {{-- Image --}}
                                    <a><img src="{{ asset('images/left-chair.svg') }}" alt="SVG Image"/></a>
                                
                                    {{-- Label and Circle --}}
                                    <div class="position-absolute"> 
                                        <div class='ml-3 mt-4'>

                                            {{-- Availability Circle --}}
                                            @if($floor && $date && $time)
                                                @if($desks[$i]->status == 'not_available')
                                                    <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                
                                                    @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                        <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>

                                                    @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                        <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                @endif
                                                @else
                                                    <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                            @endif

                                            {{-- Dynamic Desk Number --}}
                                            <p class="m-0 mt-1 text-left text-sm">{{ $desks[$i]->desk_num }}</p>

                                        </div>
                                    </div>

                                </div>
                                @endfor

                            @endif
                            
                            </div>
                        </div>
                    </div>

                    {{-- MIDDLE --}}
                    <div class="flex flex-column justify-content-between mx-2">

                        {{-- First Row --}}
                        <div class="justify-center items-start">
                            <div class="flex flex-row b-chair m-3 mb-5">

                                {{-- LOGICS --}}

                                @if($floor == 1)

                                    {{-- Iterator --}}
                                    @for($i = 4; $i < 10; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">
    
                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"/></a>
    
                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16"> 
                                            <div class='flex flex-row align-items-end'>
    
                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-2 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>
    
                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                                
                                @elseif($floor == 2)

                                    {{-- Iterator --}}
                                    @for($i = 40; $i < 46; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end '>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-2 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                                @endif           

                                {{-- <div id="106">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div> --}}

                            </div>
                        </div>

                        {{-- Second Row --}}
                        <div class="justify-center items-start">
                            <div class="flex flex-row b-chair m-3">

                                {{-- LOGICS --}}

                                @if($floor == 1)

                                    {{-- Iterator --}}
                                    @for($i = 10; $i < 16; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end mt-2.5'>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-3 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                            
                                @elseif($floor == 2)

                                    {{-- Iterator --}}
                                    @for($i = 46; $i < 52; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end mt-2.5'>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-3 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                                @endif

                                {{-- <div id="111">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div> --}}

                            </div>
                        </div>

                        {{-- Third Row --}}
                        <div class="justify-center items-start">
                            <div class="flex flex-row b-chair m-3 mb-5">

                                {{-- LOGICS --}}

                                @if($floor == 1)

                                    {{-- Iterator --}}
                                    @for($i = 16; $i < 22; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end '>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-2 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                            
                                @elseif($floor == 2)

                                    {{-- Iterator --}}
                                    @for($i = 52; $i < 58; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end '>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-2 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                                @endif

                                {{-- <div id="105">
                                    <a><img src="{{ asset('images/bottom-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div> --}}


                            </div>
                        </div>

                        {{-- Fourth Row --}}
                        <div class="justify-center items-start">
                            <div class="flex b-chair m-3">

                                {{-- LOGICS --}}

                                @if($floor == 1)

                                    {{-- Iterator --}}
                                    @for($i = 22; $i < 28; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end mt-2.5'>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-3 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                            
                                @elseif($floor == 2)

                                    {{-- Iterator --}}
                                    @for($i = 58; $i < 64; $i++)

                                    {{-- Desk --}}
                                    <div id={{ $desks[$i]->desk_num}} class="flex flex-row mx-1" wire:model.live='bookedDeskIDs' wire:click="clickDesk({{$i}})">

                                        {{-- Image --}}
                                        <a><img class="w-16" src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"/></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute w-16 "> 
                                            <div class='flex flex-row align-items-end mt-2.5'>

                                                {{-- Availability Circle --}}
                                                <div class="h-10 mt-3 ml-5">
                                                    @if($floor && $date && $time)
                                                        @if($desks[$i]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[$i]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 mb-2 mr-1 text-xs">{{ $desks[$i]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endfor 
                                @endif

                                {{-- <div id="117">
                                    <a><img src="{{ asset('images/top-chair.svg') }}" alt="SVG Image"
                                            class="h-14 mx-1 "></a>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                    {{-- RIGHT Column --}}
                    <div class="flex flex-column justify-content-between ml-12 mr-5 mt-3">

                        {{-- Upper Desks --}}
                        <div>

                            {{-- Row 1 --}}
                            <div class="b-chair m-3 flex flex-row items-end">

                                @if($floor == 1)

                                    {{-- Desk 129--}}
                                    <div id={{ $desks[28]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{28}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-end">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute mr-1"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[28]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[28]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[28]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[28]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Desk 130--}}
                                    <div id={{ $desks[29]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{29}})"
                                        class="position-relative flex flex-column-reverse align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/top-cubic.svg') }}" class="flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute "> 
                                            <div class='flex flex-row' style="margin-right: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[29]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[29]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[29]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="flex">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[29]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @elseif($floor == 2)

                                    {{-- Desk 229 --}}
                                    <div id={{ $desks[64]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{64}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-end">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute mr-1"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[64]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[64]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[64]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[64]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>   
                                    
                                    {{-- Desk 230--}}
                                    <div id={{ $desks[65]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{65}})"
                                        class="position-relative flex flex-column-reverse align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/top-cubic.svg') }}" class="flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute "> 
                                            <div class='flex flex-row' style="margin-right: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[65]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[65]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[65]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="flex">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[65]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endif

                            </div>

                            {{-- Row 2 --}}
                            <div class="b-chair flex -m-4 flex-row justify-start items-start">


                                @if($floor == 1)

                                    {{-- Desk 132 --}}
                                    <div id={{ $desks[31]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{31}})"
                                        class="position-relative flex flex-column-reverse justify-content-end align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute"> 
                                            <div class='flex flex-row' style="margin-left: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[31]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[31]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[31]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[31]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- Desk 131 --}}
                                    <div id={{ $desks[30]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{30}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-start ">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute ml-1 mb-2"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[30]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[30]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[30]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[30]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @elseif($floor ==2)

                                    {{-- Desk 232 --}}
                                    <div id={{ $desks[67]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{67}})"
                                        class="position-relative flex flex-column-reverse justify-content-end align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute"> 
                                            <div class='flex flex-row' style="margin-left: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[67]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[67]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[67]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[67]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- Desk 231 --}}
                                    <div id={{ $desks[66]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{66}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-start ">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute ml-1 mb-2"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[66]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[66]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[66]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[66]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @endif

                            </div>
                        </div>

                        {{-- Lower Desks--}}
                        <div class="my-12">

                            
                            {{-- Row 1 --}}
                            <div class="b-chair m-3 flex flex-row items-end">

                                @if($floor == 1)

                                    {{-- Desk 133--}}
                                    <div id={{ $desks[32]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{32}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-end">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute mr-1"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[32]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[32]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[32]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[32]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Desk 134--}}
                                    <div id={{ $desks[33]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{33}})"
                                        class="position-relative flex flex-column-reverse align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/top-cubic.svg') }}" class="flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute "> 
                                            <div class='flex flex-row' style="margin-right: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[33]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[33]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[33]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="flex">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[33]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @elseif($floor == 2)

                                    {{-- Desk 233 --}}
                                    <div id={{ $desks[68]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{68}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-end">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/left-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute mr-1"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[68]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[68]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[68]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[68]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>   
                                    
                                    {{-- Desk 234--}}
                                    <div id={{ $desks[69]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{69}})"
                                        class="position-relative flex flex-column-reverse align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/top-cubic.svg') }}" class="flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute "> 
                                            <div class='flex flex-row' style="margin-right: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[69]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[69]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[69]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="flex">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[69]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endif

                            </div>

                            {{-- Row 2 --}}
                            <div class="b-chair flex -m-4 flex-row justify-start items-start">


                                @if($floor == 1)

                                    {{-- Desk 136 --}}
                                    <div id={{ $desks[35]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{35}})"
                                        class="position-relative flex flex-column-reverse justify-content-end align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute"> 
                                            <div class='flex flex-row' style="margin-left: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[35]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[35]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[35]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[35]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- Desk 135 --}}
                                    <div id={{ $desks[34]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{34}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-start ">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute ml-1 mb-2"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[34]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[34]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[34]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[34]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @elseif($floor ==2)

                                    {{-- Desk 236 --}}
                                    <div id={{ $desks[71]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{71}})"
                                        class="position-relative flex flex-column-reverse justify-content-end align-items-center p-0">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/bottom-cubic.svg') }}" class=" flex h-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute"> 
                                            <div class='flex flex-row' style="margin-left: 0.5em; width: 4.1rem">

                                                {{-- Availability Circle --}}
                                                <div class="flex ml-5 mb-1">
                                                    @if($floor && $date && $time)
                                                        @if($desks[71]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[71]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[71]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 ml-1 pt-3 text-center text-xs">{{ $desks[71]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- Desk 235 --}}
                                    <div id={{ $desks[70]->desk_num}} wire:model.live='bookedDeskIDs' wire:click="clickDesk({{70}})"
                                        class="position-relative flex flex-column-reverse justify-content-start align-items-start ">

                                        {{-- Image --}}
                                        <a><img src="{{ asset('images/right-cubic.svg') }}" class=" flex w-14" alt="SVG Image"></a>

                                        {{-- Label and Circle --}}
                                        <div class="position-absolute ml-1 mb-2"> 
                                            <div class=''>

                                                {{-- Availability Circle --}}
                                                <div class="">
                                                    @if($floor && $date && $time)
                                                        @if($desks[70]->status == 'not_available')
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleNA.svg')}}" alt="SVG Image"/>
                                                        
                                                            @elseif(in_array($desks[70]->id, $bookedDeskIDs))
                                                                <img style="width: 1.4rem" src="{{ asset('images/circleBooked.svg')}}" alt="SVG Image"/>
        
                                                            @elseif(!in_array($desks[70]->id, $bookedDeskIDs))
                                                                <img  style="width: 1.4rem" src="{{ asset('images/circleAvailable.svg')}}" alt="SVG Image"/>
                                                        @endif
                                                        @else
                                                            <img style="width: 1.4rem" src="{{ asset('images/circleInvisible.svg')}}" alt="SVG Image"/>
                                                    @endif
                                                </div>

                                                {{-- Dynamic Desk Number --}}
                                                <div class="">
                                                    <p class="m-0 pt-1 text-center text-xs">{{ $desks[70]->desk_num }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @endif

                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
    
    <script src="{{ asset('js/myScript3.js') }}">
    </script>
</div>