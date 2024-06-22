<main class="rounded-lg mt-16 ml-16 overflow-hidden">
    <section>
        <div class="container mx-auto p-4 grid grid-cols-1 lg:grid-cols-2 gap-4 h-full">
            <!-- Left Column -->
            <div class="space-y-2 overflow-y-auto h-full">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Welcome!</h1>
                </div>

                <div class="container">
                    <div class="bg-white p-3 rounded shadow-sm flex justify-between">
                        <div class="w-1/2">
                            <h2 class="text-lg font-semibold mb-2">Working Hours</h2>
                            <p class="text-xs">Weekdays</p>
                            <p class="text-xs pl-2">Morning Shift <span class="pl-5">8:00 AM - 7:00 PM</span></p>
                            <p class="text-xs pl-2">Afternoon Shift <span class="pl-3">7:00 PM - 3:00 AM</span></p>
                            <p class="mt-2 text-xs">Weekends <span class="pl-12">Closed</span></p>
                        </div>
                        <div class="w-1/2 flex items-center justify-evenly">
                            <div class="min-w-32 bg-white min-h-32 pr-4 font-medium">
                                <div
                                    class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow">
                                    <div class="block rounded-t overflow-hidden text-center">
                                        <div class="bg-amber-300 text-white py-1">
                                            June
                                        </div>
                                        <div class="pt-1 border-l border-r border-white bg-white">
                                            <span class="text-4xl font-bold leading-tight">
                                                10
                                            </span>
                                        </div>
                                        <div
                                            class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                                            <span class="text-sm">
                                                Monday
                                            </span>
                                        </div>
                                        <div
                                            class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                                            <span class="text-xs leading-normal">
                                                8:00 am
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex mt-3 flex-row justify-between gap-3 mx-2.5">
                    <div class="bg-white p-4 rounded shadow-sm flex-grow flex flex-col justify-between">
                        <div class>
                            <h2 class="text-lg font-semibold">New Bookings</h2>
                        </div>
                        <div>
                            <div class="text-3xl font-bold">16</div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow-sm flex-grow flex flex-col justify-between">
                        <h2 class="text-lg font-semibold">Available</h2>
                        <div>
                            <div class="text-3xl font-bold">2</div>
                        </div>
                    </div>
                </div>
                <h2 class="text-lg font-semibold mx-2">Bookings</h2>
                <div class="bg-white p-4 rounded shadow-sm">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg">Steffanie Egloso</p>
                                <p class="text-sm text-gray-500">steff.egloso@test.com</p>
                            </div>
                            <div class="text-red-500">Rejected</div>
                            <div class="text-sm text-gray-500">May 29, 2024</div>
                            <div class="text-gray-500">&#8942;</div>
                        </div>

                        {{-- <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg">Steffanie Egloso</p>
                                <p class="text-sm text-gray-500">steff.egloso@test.com</p>
                            </div>
                            <div class="text-red-500">Rejected</div>
                            <div class="text-sm text-gray-500">May 29, 2024</div>
                            <div class="text-gray-500">&#8942;</div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg">Steffanie Egloso</p>
                                <p class="text-sm text-gray-500">steff.egloso@test.com</p>
                            </div>
                            <div class="text-red-500">Rejected</div>
                            <div class="text-sm text-gray-500">May 29, 2024</div>
                            <div class="text-gray-500">&#8942;</div>
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="container mx-auto space-y-3">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-warning text-white">
                        <img class="h-6 w-6 inline-block" src="{{ asset('images/plus.svg') }}" alt="create booking" />
                        <span>{{ __('Create Booking') }}</span>
                    </button>
                </div>

                <h2 class="text-lg font-semibold">Booking Stats</h2>
                <div class="bg-white p-4 rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h3 class="text-xl font-bold">DISTRIBUTED COLUMN</h3>
                            <p>180 Bookings</p>
                        </div>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 px-3 py-2 rounded shadow leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>This Week</option>
                                <option>Last Week</option>
                                <option>June 3 - June 7</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <img src="/images/dropdown.svg" alt="drop down">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="p-3">
                                <div class="mt-2">
                                    <canvas id="deskChart" class="w-full" style="height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="p-3">
                                <div class="mt-2">
                                    <canvas id="pieChart" class="w-full" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">

                    <label class="inline-flex items-center me-5 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-500"
                            >Enable Automatic booking
                        </span>
                    </label>

                </div>
            </div>
        </div>
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
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
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
<script>
    Livewire.on('refreshComponent', function () {
        Livewire.emit('refresh');
    });
    Livewire.on('refreshPage', function () {
        window.location.reload();
    });
</script>
