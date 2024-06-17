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

                    {{-- Toggle Auto Accept --}}
                    <div class="mt-1 mb-4 bg-yellowLight w-fit p-3 px-4 rounded-xl border-1 border-solid border-gray-200 shadow-md">
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
                    </div>
                    
                    {{-- <div>
                        <span class='cursor-pointer'
                            wire:click='$refresh'
                            >Refresh Table
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

                                        {{-- <button class="transition ease-in-out hover:bg-red-300 hover:scale-101 duration-200 bg-red-200 ml-1 px-2 py-2 rounded-md flex items-center cursor-pointer text-red-800 text-sm"
                                            wire:click="saveId({{ $booking['Id'] }})"
                                            x-data x-on:click="$dispatch('open-modal', {name: 'decline-modal'})"
                                            >Decline
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

{{-- Approve Modal --}}
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

