<main class="rounded-lg mt-16 ml-16">
   
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Welcome!</h1>
            <button class="btn btn-warning text-white">  
                <img class="h-6 w-6 inline-block" src="{{ asset('images/plus.svg') }}" alt="create booking"/>
                <span>{{ __('Create Booking') }}</span>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold mb-2">Working Hours</h2>
                <p>Weekdays</p>
                <p>8:00 am - 7:00 pm</p>
                <p>7:00 pm - 3:00 am</p>
                <p class="mt-2">Weekends</p>
                <p>Closed</p>
                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <p>Mon Jun</p>
                        <h3 class="text-xl font-bold">7</h3>
                    </div>
                    <div>
                        <p>2:00 PM</p>
                    </div>
                </div>
            </div>
    
            <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">New Bookings</h2>
                        <span class="text-2xl">16</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Available</h2>
                        <span class="text-2xl">2</span>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="checkbox" id="autoBooking" class="mr-2">
                    <label for="autoBooking">Enable automatic booking</label>
                </div>
            </div>
    
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold mb-2">Booking Stats</h2>
                <div>
                    <h3 class="text-2xl font-bold">5,000.00</h3>
                    <p>50 Orders</p>
                </div>
                <div class="mt-4">
                    <canvas id="ordersChart"></canvas>
                </div>
                <div class="mt-4">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    
        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-lg font-semibold mb-2">Bookings</h2>
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <div>
                        <p>Kayla Acosta</p>
                        <p class="text-sm text-gray-500">kayla.acosta@test.com</p>
                    </div>
                    <div class="text-red-500">Rejected</div>
                    <div class="text-sm text-gray-500">May 29, 2024</div>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p>Rieza Espejo</p>
                        <p class="text-sm text-gray-500">rieza.espejo@test.com</p>
                    </div>
                    <div class="text-red-500">Rejected</div>
                    <div class="text-sm text-gray-500">May 30, 2024</div>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p>Azhelle Casimiro</p>
                        <p class="text-sm text-gray-500">azhelle.casimiro@test.com</p>
                    </div>
                    <div class="text-green-500">Accepted</div>
                    <div class="text-sm text-gray-500">May 30, 2024</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <input type="checkbox" id="autoBooking" class="mr-2">
        <label for="autoBooking">Enable automatic booking</label>
    </div>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Orders',
                    data: [5, 10, 15, 20, 25, 30],
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
                }
            }
        });
    
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Available', 'Booked', 'Not Available'],
                datasets: [{
                    data: [20, 8, 2],
                    backgroundColor: ['#00CC2D', '#FFAE35', '#575757'],
                    hoverOffset: 4
                }]
            }
        });
    </script>
    
    
   


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
                <button class="flex items-center border-solid border-green-500 border-1 bg-green-300 px-4 py-2 rounded-4 font-semibold text-lg text-green-50"
                        wire:click="acceptBooking"
                        x-on:click="$dispatch('close-modal')">
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
                <button class="flex items-center border-solid border-red-500 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-red-50"
                        wire:click="declineBooking"
                        x-on:click="$dispatch('close-modal')">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</main>

<script>
    // Automatically refresh the Livewire component when a browser event is received
    Livewire.on('refreshComponent', function () {
        Livewire.emit('refresh');
    });
    Livewire.on('refreshPage', function () {
        window.location.reload();
    });
    
    // Livewire doesn't work because of this
    // $(document).ready(function() {
    //     $('#bookingsTable').DataTable({
    //         lengthChange: false,
    //         searching: true,
    //         initComplete: function () {
    //             // Add dropdown filter for Status column
    //             this.api().columns(4).every(function () {
    //                 var column = this;
    //                 var select = $('<select><option value="">Status</option><option value="accepted">Accepted</option><option value="canceled">Canceled</option></select>')
    //                     .appendTo($(column.header()).empty())
    //                     .on('change', function () {
    //                         var val = $.fn.dataTable.util.escapeRegex($(this).val());
    //                         column.search(val ? '^' + val + '$' : '', true, false).draw();
    //                     });

    //                 // Add select styling
    //                 select.select2({ width: '100%', theme: 'bootstrap' });
    //             });
    //         }
            
    //     });
    // });
</script>

