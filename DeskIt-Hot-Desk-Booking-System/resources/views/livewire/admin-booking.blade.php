<div class=" rounded-lg mt-16 ml-16">
    <section class="section2">
        <div class="bg">
            <div class="content flex flex-row mx-20">
                {{-- Title and Date Picker --}}
                <div class="w-25 mx-5">
                    <h2>Dashboard</h2>
                    <!-- <div>
                        <section class="container">
                            <form method="POST" action="">
                                @csrf
                                <div class="col-12">
                                    <div>
                                        <input type="date"
                                            class="form-control bg-warning text-light text-center"
                                            id="datepicker"
                                            wire:model="date"
                                            min="{{ $min }}"
                                            max="{{ $max }}"
                                        />
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div> -->
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
            <div>
                <h2 class="inline justify-start text-xl px-4 pt-2 pb-2 bg-yellowB text-white rounded-t-lg z-0">Bookings</h2>
                <!-- Power Grid -->
                <livewire:admin-table-booking/>
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
    @powerGridSripts
    <script src="{{ asset('vendor/powergrid/powergrid.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <script>
        // Automatically refresh the Livewire component when a browser event is received
        Livewire.on('refreshComponent', function () {
            Livewire.emit('refresh');
        });
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
</div>

