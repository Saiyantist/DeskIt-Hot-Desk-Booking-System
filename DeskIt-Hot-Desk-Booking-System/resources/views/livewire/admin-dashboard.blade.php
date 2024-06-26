<main class="rounded-lg mt-16 ml-16 overflow-hidden">
    <section>
       
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Left Column -->
            <div class="col-span-2 lg:col-span-2 space-y-4 lg:ml-5">

                <div class=" rounded-lg ">
                    <h1 class="text-3xl font-bold mt-4">Welcome!</h1>
                   

                    <div class="mx-auto flex flex-col lg:flex-row items-center justify-center space-y-4 lg:space-y-0 lg:space-x-4 w-1/2 max-w-screen-lg p-6 rounded-lg">
                        <!-- Calendar Section -->
                        <div class="shadow rounded-lg p-4 bg-white flex-shrink-0">
                          <div class="text-center">
                            <div class="text-amber-500 text-xl font-semibold mb-2">{{ $currentMonth }}</div>
                            <div class="text-6xl font-bold mb-2">{{ $currentDay }}</div>
                            <div class="text-lg">{{ $currentWeek }}</div>
                            <div class="text-sm">{{ $currentTime }}</div>
                          </div>
                        </div>
                    
                        <!-- Working Hours Section -->
                        <div class="bg-white py-6 px-10 rounded shadow w-auto flex-shrink-0">
                          <h2 class="text-lg font-semibold mb-2">Working Hours</h2>
                          <p class="text-xs">Weekdays</p>
                          <p class="text-xs pl-2">Morning Shift <span class="pl-5">8:00 AM - 7:00 PM</span></p>
                          <p class="text-xs pl-2">Afternoon Shift <span class="pl-3">7:00 PM - 3:00 AM</span></p>
                          <p class="mt-2 text-xs">Weekends <span class="pl-12">Closed</span></p>
                        </div>
                      </div>
                </div>
                      
                  

                  <div>
                    <h2 class="font-mono text-center italic text-4xl font-semibold text-slate-600 ">
                        Today's Bookings
                    </h2>
                </div>
                

              
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 px-28">
                    <!-- New Bookings -->
                    <div class="w-full">
                        <div class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 shadow rounded-md p-4">
                            <div class="flex items-center justify-center mb-1">
                                <h2 class="text-4xl font-semibold">{{$newBookings}}</h2>
                                <img src="{{ asset('images/new.svg') }}" class="h-8 w-8 ml-4" alt="New Bookings">
                            </div>
                            <span class="text-md font-semibold pl-10">New Bookings</span>
                        </div>
                    </div>
                    <!-- Total Bookings -->
                    <div class="w-full">
                        <div class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 shadow rounded-md p-4">
                            <div class="flex items-center justify-center mb-1">
                                <h2 class="text-4xl font-semibold">{{ $totalBookings }}</h2>
                                <img src="{{ asset('images/total.svg') }}" class="h-8 w-8 ml-4" alt="Total Bookings">
                            </div>
                            <span class="text-md font-semibold pl-10">Total Bookings</span>
                        </div>
                    </div>
                </div>
            


                <div class="grid grid-cols-1 md:grid-cols-6 w-full gap-4 pt-6 mx-auto">
                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/floorOne.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor1Bookings }}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center">Floor 1 Bookings </span>
                        </div>
                    </div>
                          
                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/available.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor1AvailableDesk}}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center">Available Desk </span>
                        </div>
                    </div>
                    
                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/not.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor1NotAvailable }}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center">Not Available Desk </span>
                        </div>
                    </div>
                



                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/floortwo.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor1Bookings }}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center">Floor 2 Bookings </span>
                        </div>
                    </div>
                          
                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/available.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor2AvailableDesk }}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center">Available Desk </span>
                        </div>
                    </div>
                    
                    <div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-200 shadow rounded-md p-8 w-auto h-44 flex flex-col items-center">
                            <img src="{{ asset('images/not.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                            <div class="mb-1">
                                <h2 class="text-4xl font-semibold">{{ $floor2NotAvailable }}</h2>
                            </div>
                            <span class="text-xs font-semibold text-center"> Not Available Desk</span>
                        </div>
                    </div>

                </div>

               

            </div>
                    
            <!-- Right Column -->
            <div class="col-span-1 lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-3">
                        <button class="btn btn-warning text-white">
                            <img class="h-6 w-6 inline-block mr-2" src="{{ asset('images/plus.svg') }}" alt="Create Booking">
                            <span>Create Booking</span>
                        </button>
                    </div>
                    <h2 class="text-lg font-semibold mb-3">Booking Statistics</h2>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                             
                                <p class="text-sm">180 Bookings</p>
                            </div>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 px-3 py-2 rounded shadow leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>This Week</option>
                                    <option>Last Week</option>
                                    <option>June 3 - June 7</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <img src="/images/dropdown.svg" alt="Dropdown Icon">
                                </div>
                            </div>
                        </div>
                        <!-- Placeholder for charts -->
                        <div class="mt-4">
                            <canvas id="deskChart" class="w-full" style="height: 300px;"></canvas>
                        </div>
                        <div class="mt-4">
                            <canvas id="pieChart" class="w-full" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Define shared data for both charts
            var weekDays = ['Mon', 'Tues', 'Wed', 'Thurs', 'Friday'];
            var deskData = [15, 10, 12, 30, 10, 15];

            // Bar Chart
            var ctx = document.getElementById('deskChart').getContext('2d');
            var ordersChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: weekDays,
                    datasets: [{
                        label: 'Desk',
                        data: deskData.slice(0, 5), // Only use data for weekdays
                        backgroundColor: ['red', 'blue', 'green', 'pink', 'yellow', 'violet', 'orange'],
                        borderColor: ['orange','red', 'blue', 'green', 'pink', 'yellow', 'violet'],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    }
                }
            });

            // Pie Chart
            var pieCtx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Available', 'Not Available', 'Booked'],
                    datasets: [{
                        data: [deskData[0], deskData[1], deskData.slice(2).reduce((a, b) => a + b, 0)],
                        backgroundColor: ['#00CC2D', '#575757', '#FFAE35'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    }
                }
            });
        </script>
    </section>


    <section class="mt-5">
        <div class="flex justify-center">
            <div class="bg-white rounded-lg w-[80%] shadow-md">
                
                {{-- Tabs? --}}
                <div class="self-start w-full flex">
                    {{-- Bookings tab? --}}
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 rounded-tl-xl border-solid border-yellowB border-b-[3px] bg-yellowLight"
                        wire:click="">
                        <h2 class="justify-center text-xl">Bookings</h2>
                    </div>
                    {{-- Foo tab? --}}
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200"
                        wire:click="">
                        <h2 class="justify-center text-xl">Foo</h2>
                    </div>
                </div>

                <div class="p-3 bg-gray-100">

              {{-- Toggle Auto Accept --}}
              <div
              class="mt-1 mb-4 bg-yellowLight w-fit p-3 px-4 rounded-xl border-1 border-solid border-gray-200 shadow-sm">
              @if (Config::get('bookings.auto_accept'))
                  <span class="text-lg font-semibold">Auto-accept: ON</span>
                  <button
                      class="justify-center items-center bg-yellowB text-white hover:bg-slate-200 hover:text-red font-bold rounded-xl h-10 p-1 px-3 text-md ml-4"
                      wire:model.change="autoAccept" wire:click='toggleAutoAccept' wire:submit>Turn OFF
                  </button>
              @else
                  <span class="text-lg">Auto-accept: OFF</span>
                  <button
                      class="justify-center items-center bg-slate-300 hover:bg-amber-500 text-white font-bold rounded-xl h-10 p-1 px-3 text-md ml-4"
                      wire:model.change="autoAccept" wire:click='toggleAutoAccept' wire:submit>Turn ON
                  </button>
              @endif
          </div>
                    {{-- <div>
                        <span class='cursor-pointer' wire:click='$refresh'>Refresh Table
                        </span>
                    </div> --}}

                    <!-- Yajra Datatable -->
                    <div class="bg-white p-3">
                        <table id="bookingsTable" class="table text-center">
                            <thead>
                                <tr>
                                    <th class="w-1/6">ID</th>
                                    <th class="w-1/6">Name</th>
                                    <th class="w-1/6">Date</th>
                                    <th class="w-1/6">Desk ID</th>
                                    <th class="w-1/6">Status</th>
                                    <th class="w-1/6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookingsData as $booking)
                                    <tr>
                                        <td>{{ $booking['Id'] }}</td>
                                        <td class="max-w-64 truncate ...">{{ $booking['Name'] }}</td>
                                        <td>{{ $booking['Date'] }}</td>
                                        <td>{{ $booking['Desk ID'] }}</td>
                                        <td>{{ $booking['Status'] }}</td>

                                    {{-- Action --}}
                                    <td class="p-2 w-full flex justify-content-around">
                                    @if($booking['Status'] === 'pending' )
                                   
                                        {{-- Accept Modal Open  --}}
                                        <button class="transition ease-in-out hover:bg-green-300 hover:scale-101 duration-200 bg-green-200 px-2.5 py-2 rounded-md flex items-center cursor-pointer text-green-800 text-sm"
                                            wire:click="saveId({{ $booking['Id'] }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'accept-modal'})"
                                            >Accept
                                        </button>
            
                                        {{-- Decline Modal Open  --}}
                                        <button class="transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-md flex items-center cursor-pointer text-red-800 text-sm"
                                            wire:click="saveId({{ $booking['Id'] }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'decline-modal'})"
                                            >Decline
                                        </button>

                                            @elseif($booking['Status'] === 'accepted')

                                                <p class="text-sm">. . .</p>

                                                {{-- For Testing Convenience purpose --}}

                                                {{-- <button
                                                    class="transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 py-2 rounded-md flex items-center cursor-pointer text-red-800 text-sm"
                                                    wire:click="saveId({{ $booking['Id'] }})" x-data
                                                    x-on:click="$dispatch('open-modal', {name: 'decline-modal'})">Decline
                                                </button> --}}

                                            @elseif($booking['Status'] === 'canceled')
                                                <p class="text-sm">. . .</p>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
    </section>

    {{-- Accept Modal --}}
    <x-modal name="accept-modal" title="Accept Booking">
        <x-slot:body>
            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                @if($alterBooking)
                    <div class='flex flex-column justify-center'>
                        <span class="text-lg text-center truncate ...">Booking ID: {{$alterBooking->id}}</span>
                        <span class="text-lg text-center truncate ...">Booking Date: {{$alterBooking->booking_date}}</span>
                        <span class="text-lg text-center truncate ...">Desk ID: {{$alterBooking->desk->desk_num}}</span>
                        <span class="text-lg text-center truncate ...">User: {{$alterBooking->user->name}}</span>
                    </div>

                    <div class="flex justify-center">
                        <button
                            class="flex items-center border-solid border-green-500 border-1 bg-green-300 px-4 py-2 rounded-4 font-semibold text-lg text-green-50"
                            wire:click="acceptBooking" x-on:click="$dispatch('close-modal')">
                            Accept
                        </button>
                    </div>
                @endif
            </div>
        </x-slot:body>
    </x-modal>

    {{-- Decline Modal --}}
    <x-modal name="decline-modal" title="Decline Booking">
        <x-slot:body>
            <div class='flex flex-column justify-center rounded-3 w-[90%] h-[85%] p-2'>
                @if($alterBooking)
                    <div class='flex flex-column justify-center'>
                        <span class="text-lg text-center truncate ...">Booking ID: {{$alterBooking->id}}</span>
                        <span class="text-lg text-center truncate ...">Booking Date: {{$alterBooking->booking_date}}</span>
                        <span class="text-lg text-center truncate ...">Desk ID: {{$alterBooking->desk->desk_num}}</span>
                        <span class="text-lg text-center truncate ...">User: {{$alterBooking->user->name}}</span>
                    </div>

                    <div class="flex justify-center">
                        <button
                            class="flex items-center border-solid border-red-500 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                            wire:click="declineBooking" x-on:click="$dispatch('close-modal')">
                            Decline
                        </button>
                    </div>
                @endif
            </div>
        </x-slot:body>
    </x-modal>

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</main>


<script>
    Livewire.on('refreshComponent', function () {
        Livewire.emit('refresh');
    });
    Livewire.on('refreshPage', function () {
        window.location.reload();
    });
</script>

<script>
     document.addEventListener('livewire:load', function () {
            @this.checkPendingBookings();
        });
</script>