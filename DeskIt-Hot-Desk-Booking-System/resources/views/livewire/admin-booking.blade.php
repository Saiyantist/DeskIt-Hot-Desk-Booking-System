<div class=" rounded-lg">
    <section class="section2">
        <div class="bg">
            <div class="content">
                <div class="mx-5">
                    <h2>Dashboard</h2>
                    <div>
                        <section class="container">
                            <form method="POST" action="">
                                @csrf
                                <div class="col-12">
                                    <div>
                                        <input type="date"
                                            class="form-control bg-warning text-light text-center"
                                            id="datepicker"
                                            wire:model="date"
                                            min="{{ now()->toDateString() }}" {{-- Set minimum date to current date --}}
                                            max="{{ now()->addDays(14)->toDateString() }}" {{-- Set maximum date to 14 days from now --}}
                                        />
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>

                <div>
                    <p class="text">AVAILABLE DESK</p>
                    <p class="text-data">{{ $availableDeskCount }}</p>
                </div>
                <div>
                    <p class="text">BOOKED</p>
                    <p class="text-data">{{ $bookedCount }}</p>
                </div>
                <div>
                    <p class="text">NOT AVAILABLE</p>
                    <p class="text-data">{{ $notAvailableCount }}</p>
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
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">{{ $floor1AvailableDeskCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED</p>
                        <p class="text-data">{{ $floor1BookedCount }}</p>
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
                        <p class="text">AVAILABLE DESK</p>
                        <p class="text-data">{{ $floor2AvailableDeskCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">BOOKED</p>
                        <p class="text-data">{{ $floor2BookedCount }}</p>
                    </div>
                    <div class="floor-bg">
                        <p class="text">NOT AVAILABLE</p>
                        <p class="text-data">{{ $floor2NotAvailableCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" mt-44">
        <div class="flex justify-center">
           <div>
            <h2 class=" inline justify-start text-xl px-4 pt-2 pb-2 bg-yellowB text-white rounded-t-lg z-0">Bookings
            </h2>

            <table class=" p-10 justify-center items-center text-center relative bg-gray z-10">
                <thead>
                    <tr>
                        @foreach($data[0] as $key => $value)
                        <th class=" px-12 py-2 justify-center items-center bg-grey">{{ strtoupper($key) }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $index => $row)
                    <tr>
                        @foreach($row as $key => $value)

                        <td class="p-2" @if ($key==='Action' ) wire:click="openModal({{ $index }})" @endif>
                            {!! $value !!}
                        </td>

                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>

        </div>
    </section>


    <!-- Modal -->
    @if ($showModal)
        <div class="mod absolute bottom-1/3 left-1/3 bg-white h-48 w-96 shadow-md z-10">
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
    <script>
        // Automatically refresh the Livewire component when a browser event is received
        Livewire.on('refreshComponent', function () {
            Livewire.emit('refresh');
        });
    </script>
</div>