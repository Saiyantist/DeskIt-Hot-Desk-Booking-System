<main class=" rounded-lg mt-16 ml-16">
    <section class="section2">
        <div class="bg">
            <div class="content flex flex-row mx-20">
                {{-- Title and Date Picker --}}
                <div class="w-25 mx-5">
                    <h2>Dashboard</h2>
                </div>

                {{-- Main Statistics --}}
                <div class='w-75 flex flex-row bg-yellowB rounded-4 p-0'>
                    <div>
                        <p class="text font-semibold text-white">TOTAL BOOKED DESKS</p>
                        <p class="text-data text-white">{{ $bookedCount }}</p>
                    </div>
                    <div>
                        <p class="text font-semibold text-white">TOTAL UNBOOKED DESKS</p>
                        <p class="text-data text-white">{{ $availableDeskCount - $bookedCount }}</p>
                    </div>
                    <div>
                        <p class="text font-semibold text-white">AVAILABLE DESKS</p>
                        <p class="text-data text-white">{{ $availableDeskCount }}</p>
                    </div>
                    <div>
                        <p class="text font-semibold text-white">NOT AVAILABLE</p>
                        <p class="text-data text-white">{{ $notAvailableCount }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="half">
            <div class="floor1">
                <div class="floor-content">
                    <div class="floor">
                        <p class="text">FLOOR 1</p>
                        <p class="text-data">{{ $floor1Count }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED DESKS</p>
                        <p class="text-data">{{ $floor1BookedCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">UNBOOKED DESKS</p>
                        <p class="text-data">{{ $floor1BookedCount - ($bookedCount - 36) }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">{{ $floor1AvailableDeskCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">NOT AVAILABLE</p>
                        <p class="text-data">{{ $floor1NotAvailableCount }}</p>
                    </div>
                </div>
            </div>
            <div class="floor2">
                <div class="floor-content">
                    <div class="floor">
                        <p class="text">FLOOR 2</p>
                        <p class="text-data">{{ $floor2Count }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED DESKS</p>
                        <p class="text-data">{{ $floor2BookedCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">UNBOOKED DESKS</p>
                        <p class="text-data">{{ $floor2BookedCount - ($bookedCount - 36) }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">{{ $floor2AvailableDeskCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">NOT AVAILABLE</p>
                        <p class="text-data">{{ $floor2NotAvailableCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="mt-44">
        <div class="flex justify-center">
            <div class="bg-white rounded-lg w-[80%]">

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
                    {{-- Toggle Aauto Accept --}}
                    <div class="mt-1 mb-4 bg-yellowLight w-fit p-3 px-4 rounded-lg">
                        @if ( Config::get('bookings.auto_accept') )
                        <span class="text-lg font-semibold">Auto-accept: ON</span>
                        <button class="justify-center items-center bg-yellowB text-white hover:bg-slate-200 hover:text-red font-bold rounded-xl h-10 p-1 px-3 text-md ml-4"
                                wire:model.change="autoAccept"
                                wire:click='toggleAutoAccept'
                                wire:submit>Turn OFF
                        </button>
                        @else
                        <span class="text-lg">Auto-accept: OFF</span>
                        <button class="justify-center items-center bg-slate-300 hover:bg-amber-500 text-white font-bold rounded-xl h-10 p-1 px-3 text-md ml-4"
                                wire:model.change="autoAccept"
                                wire:click='toggleAutoAccept'
                                wire:submit>Turn ON
                        </button>
                        
                        @endif
                        {{-- <span>{{ config('bookings.auto_accept') ? 'Auto-accept: ON' : 'Auto-accept: OFF' }}</span>
                        <button class="justify-center items-center bg-yellowB hover:bg-amber-500 text-white font-bold rounded-xl h-10 p-1 px-3 text-md"
                                wire:model.change="autoAccept"
                                wire:click='toggleAutoAccept'
                                wire:submit>
                            {{ config('bookings.auto_accept') ? 'Turn Off' : 'Turn On' }}
                        </button> --}}
                    </div>
    
                    <!-- DataTables Table -->
                    <div class="bg-white p-3 r"
                        wire:ignore>
                        <table id="bookingsTable" class="table">
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
                                    <td>{{ $booking['Name'] }}</td>
                                    <td>{{ $booking['Date'] }}</td>
                                    <td>{{ $booking['Desk ID'] }}</td>
                                    <td>{{ $booking['Status'] }}</td>
                                    <td>
                                        @if ($booking['Status'] != 'canceled')
                                        <button onclick="openModal({{ $loop->index }})">Cancel</button>
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
    <!-- Modal -->
    @if ($showModal)
        <div class="mod absolute bottom-1/3 left-1/3 bg-white h-48 w-96 shadow-md z-0">
            <button wire:click="closeModal" class="float-right">X</button>
            <p class="text-lg pt-4 text-center">
                Are you sure you want to cancel this booking?
            </p>
            <div class="flex justify-around px-3 pt-1">
                <button wire:click="handleAction">YES</button>
                <button wire:click="closeModal">NO</button>
            </div>
        </div>
    @endif
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
    
    $(document).ready(function() {
        $('#bookingsTable').DataTable({
            lengthChange: false,
            searching: true,
            initComplete: function () {
                // Add dropdown filter for Status column
                this.api().columns(4).every(function () {
                    var column = this;
                    var select = $('<select><option value="">Status</option><option value="accepted">Accepted</option><option value="canceled">Canceled</option></select>')
                        .appendTo($(column.header()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    // Add select styling
                    select.select2({ width: '100%', theme: 'bootstrap' });
                });
            }
            
        });
    });
</script>
