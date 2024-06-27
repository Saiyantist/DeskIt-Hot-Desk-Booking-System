<main class="rounded-lg mt-16 ml-16 overflow-hidden">
    <div class="container grid grid-cols-1 gap-4">
        <!-- Left Column -->
        <div class="col-span-2 lg:col-span-2 space-y-4 lg:ml-5">

            <div class=" rounded-lg ">
                <h1 class="text-3xl font-bold mt-4">Welcome!</h1>
            </div>

            <div class=" flex flex-col lg:flex-row lg:space-y-0 lg:space-x-4 p-2 rounded-lg">
                <!-- Calendar Section -->

                <div class="bg-amber-300 shadow rounded-lg flex-shrink-0 text-center">
                    <div class="text-xl font-semibold m-1 text-white">{{ $currentMonth }}</div>
                    <div class="p-3 bg-white">
                        <div class="text-3xl font-bold mb-1">{{ $currentDay }}</div>
                        <div class="text-base">{{ $currentWeek }}</div>
                        <div class="text-sm">{{ $currentTime }}</div>
                    </div>
                </div>

                <!-- Working Hours Section -->
                <div class="bg-white py-2 px-4 rounded shadow w-auto flex-shrink-0">
                    <h2 class="text-lg font-semibold mt-2 mb-2">Working Hours</h2>
                    <p class="text-sm m-0">Weekdays</p>
                    <p class="text-sm m-0 pl-2">Morning Shift <span class="pl-5">8:00 AM - 7:00 PM</span></p>
                    <p class="text-sm m-0 pl-2">Afternoon Shift <span class="pl-3">7:00 PM - 3:00 AM</span></p>
                    <p class="mt-1 text-sm">Weekends <span class="pl-12">Closed</span></p>
                </div>

                <div class="flex flex-col w-1/4">
                    <!-- New Bookings -->
                    <div class="m-1 text-center">
                        <div
                            class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 shadow rounded-md p-1">

                            <span class="text-md font-semibold">New Bookings</span>
                            <div class="flex items-center justify-center">
                                <h2 class="text-2xl font-semibold">{{$newBookings}}</h2>
                                <img src="{{ asset('images/new.svg') }}" class="h-5 w-5 ml-4" alt="New Bookings">
                            </div>
                        </div>
                    </div>

                    <!-- Total Bookings -->
                    <div class="m-1 text-center">
                        <div
                            class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 shadow rounded-md p-1">
                            <span class="text-md font-semibold">Total Bookings</span>
                            <div class="flex items-center justify-center">
                                <h2 class="text-2xl font-semibold">{{ $totalBookings }}</h2>
                                <img src="{{ asset('images/total.svg') }}" class="h-5 w-5 ml-4" alt="Total Bookings">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- floor 1 Bookings --}}
                <div class="w-1/2 flex flex-row shadow text-center">
                    <div
                        class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-200 p-2 flex flex-col items-center justify-center rounded-l-lg">

                        <img src="{{ asset('images/floorOne.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Floor 1 Bookings</span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold text-center">{{ $floor1Bookings }}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div
                        class="bg-gradient-to-b from-yellow-50 to-yellow-200 flex flex-col items-center  justify-center p-2">

                        <img src="{{ asset('images/available.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Available Desk </span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold">{{ $floor1AvailableDesk}}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div
                        class="bg-gradient-to-t from-yellow-50 to-yellow-200 flex flex-col items-center  justify-center p-2 rounded-r-lg ">

                        <img src="{{ asset('images/not.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Not Available Desk </span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold">{{ $floor1NotAvailable }}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- floor 2 bookings --}}
                <div class="w-1/2 flex flex-row shadow text-center">
                    <div
                        class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-200 p-2 flex flex-col items-center justify-center rounded-l-lg">

                        <img src="{{ asset('images/floortwo.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Floor 2 Bookings</span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold text-center">{{ $floor2Bookings }}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div
                        class="bg-gradient-to-b from-yellow-50 to-yellow-200 flex flex-col items-center  justify-center p-2">

                        <img src="{{ asset('images/available.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Available Desk </span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold">{{ $floor2AvailableDesk}}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div
                        class="bg-gradient-to-t from-yellow-50 to-yellow-200 flex flex-col items-center  justify-center p-2 rounded-r-lg ">

                        <img src="{{ asset('images/not.svg') }}" class="h-5 w-5 mb-2" alt="Total Bookings">
                        <table>
                            <tr>
                                <th>
                                    <span class="text-md font-semibold text-center block">Not Available Desk </span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="text-2xl font-semibold">{{ $floor2NotAvailable }}</h2>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex justify-between">
            <div class="bg-white rounded-lg shadow-md w-full mx-10">
                {{-- Tabs? --}}
                <div class="self-start w-full flex justify-between">
                    {{-- Bookings tab? --}}
                    <div class="px-4 pt-3 pb-2 cursor-pointer transition ease-in-out delay-50 hover:bg-yellowA duration-200 rounded-tl-xl border-solid border-yellowB border-b-[3px] bg-yellowLight"
                        wire:click="">
                        <h2 class="justify-center text-xl">Bookings</h2>
                    </div>
                    <div class="flex justify-center items-center mx-10">
                        <h6>Enable Automatic Booking</h6>
                        <div>
                            @if (Config::get('bookings.auto_accept'))
                            <button
                                class="justify-center items-center bg-green-500 text-white hover:bg-green-600 hover:text-white font-bold rounded-xl p-0 px-3 text-md ml-4"
                                wire:model.change="autoAccept" wire:click='toggleAutoAccept' wire:submit>
                                <i class="fa-solid fa-toggle-on"></i>
                            </button>
                            @else
                                <button
                                    class="justify-center items-center bg-gray-300 hover:bg-gray-400 text-white font-bold rounded-xl p-0 px-3 text-md ml-4"
                                    wire:model.change="autoAccept" wire:click='toggleAutoAccept' wire:submit>
                                    <i class="fa-solid fa-toggle-off"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-gray-100">

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

                                        {{-- Accept Modal Open --}}
                                        <button
                                            class="transition ease-in-out hover:bg-green-300 hover:scale-101 duration-200 bg-green-200 px-2.5 py-2 rounded-md flex items-center cursor-pointer text-green-800 text-sm"
                                            wire:click="saveId({{ $booking['Id'] }})" x-data
                                            x-on:click="$dispatch('open-modal', {name: 'accept-modal'})">Accept
                                        </button>

                                        {{-- Decline Modal Open --}}
                                        <button
                                            class="transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 rounded-md flex items-center cursor-pointer text-red-800 text-sm"
                                            wire:click="saveId({{ $booking['Id'] }})" x-data
                                            x-on:click="$dispatch('open-modal', {name: 'decline-modal'})">Decline
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
                        <div class="mt-4 flex justify-between items-center">
                            <div>
                                {{ $bookings->links() }}
                            </div>
                            <div>
                                @if ($bookings->hasMorePages())
                                    <button wire:click="gotoPage({{ $bookings->currentPage() + 1 }})"
                                            class="px-3 py-1 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md focus:outline-none">
                                        Next Page
                                    </button>
                                @endif
                                @if ($bookings->currentPage() > 1)
                                    <button wire:click="gotoPage({{ $bookings->currentPage() - 1 }})"
                                            class="px-3 py-1 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md focus:outline-none">
                                        Previous Page
                                    </button>
                                @endif
                            </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-3">
                        <button class="btn btn-warning text-white">
                            <img class="h-6 w-6 inline-block mr-2" src="{{ asset('images/plus.svg') }}"
                                alt="Create Booking">
                            <span>Create Booking</span>
                        </button>
                    </div>
                    <h2 class="text-lg font-semibold mb-3">Booking Statistics</h2>
                    <div class="bg-white p-2 rounded-lg shadow-sm">
                        <div class="flex justify-between items-center text-center mb-3">
                            <div>
                                <span class="text-sm">Total Bookings</span>
                                <p class="text-sm">{{ $totalBookings }}</p>
                            </div>
                            <div class="relative">
                                <select id="weekSelector" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 px-3 py-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="this_week">This Week</option>
                                    <option value="last_week">Last Week</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-100">
                                    <img src="/images/dropdown.svg" alt="Dropdown Icon">
                                </div>
                            </div>
                        </div>
                        <!-- Placeholder for charts -->
                        <div class="mt-4 flex justify-around">
                            <label class="inline-flex items-center">
                                <input type="radio" name="chartOption" value="deskChart" checked class="h-2 w-2">
                                <span class="ml-2 text-gray-700">Desk Chart</span>
                            </label>
                            <label>
                                <input type="radio" name="chartOption" value="pieChart" class="h-2 w-2">
                                Pie Chart
                            </label>
                        </div>
                        
                        <div class="mt-4">
                            <canvas id="deskChart" width="200" height="200"></canvas>
                        </div>
                        <div class="mt-4" style="display: none;">
                            <canvas id="pieChart" width="200" height="200"></canvas>
                        </div>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const radioButtons = document.querySelectorAll('input[name="chartOption"]');
                                const deskChartDiv = document.getElementById('deskChart').parentElement;
                                const pieChartDiv = document.getElementById('pieChart').parentElement;
                        
                                radioButtons.forEach(radio => {
                                    radio.addEventListener('change', function() {
                                        if (this.value === 'deskChart') {
                                            deskChartDiv.style.display = 'block';
                                            pieChartDiv.style.display = 'none';
                                        } else if (this.value === 'pieChart') {
                                            deskChartDiv.style.display = 'none';
                                            pieChartDiv.style.display = 'block';
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var weekBookings = @json($weekBookings);

        var availableDesksThisWeek = @json($availableDesksThisWeek);
        var notAvailableDesksThisWeek = @json($notAvailableDesksThisWeek);
        var bookedDesksThisWeek = @json($bookedDesksThisWeek);

        var availableDesksLastWeek = @json($availableDesksLastWeek);
        var notAvailableDesksLastWeek = @json($notAvailableDesksLastWeek);
        var bookedDesksLastWeek = @json($bookedDesksLastWeek);

        var deskData = {
            'this_week': [
                weekBookings.this_week.monday,
                weekBookings.this_week.tuesday,
                weekBookings.this_week.wednesday,
                weekBookings.this_week.thursday,
                weekBookings.this_week.friday
            ],
            'last_week': [
                weekBookings.last_week.monday,
                weekBookings.last_week.tuesday,
                weekBookings.last_week.wednesday,
                weekBookings.last_week.thursday,
                weekBookings.last_week.friday
            ]
        };

        var pieData = {
            'this_week': {
                available: availableDesksThisWeek,
                notAvailable: notAvailableDesksThisWeek,
                booked: bookedDesksThisWeek
            },
            'last_week': {
                available: availableDesksLastWeek,
                notAvailable: notAvailableDesksLastWeek,
                booked: bookedDesksLastWeek
            }
        };

        var ctx = document.getElementById('deskChart').getContext('2d');
        var ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri'],
                datasets: [{
                    label: 'Desk',
                    data: deskData.this_week,
                    backgroundColor: ['#FFC0CB', '#ADD8E6', '#EE82EE', '#FFD700', '#FFA07A'],
                    borderColor: ['#FFA07A', '#FFC0CB', '#ADD8E6', '#EE82EE', '#FFD700'],
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

        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Available', 'Not Available', 'Booked'],
                datasets: [{
                    data: [pieData.this_week.available, pieData.this_week.notAvailable, pieData.this_week.booked],
                    backgroundColor: ['#FFD700', '#FF69B4', '#FFA500'],
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

        document.getElementById('weekSelector').addEventListener('change', function() {
            var selectedWeek = this.value;

            ordersChart.data.datasets[0].data = deskData[selectedWeek];
            ordersChart.update();

            pieChart.data.datasets[0].data = [
                pieData[selectedWeek].available, 
                pieData[selectedWeek].notAvailable, 
                pieData[selectedWeek].booked
            ];
            pieChart.update();
        });
    </script>



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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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