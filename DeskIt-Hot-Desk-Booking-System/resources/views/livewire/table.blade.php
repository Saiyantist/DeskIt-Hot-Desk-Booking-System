<div class=" relative bg-gray rounded-lg">

    <h2 class=" justify-start text-xl px-4 pt-3">Your Bookings</h2>

    <table class=" p-10 justify-center items-center text-center">
        <thead>
            <tr>
                @foreach($data[0] as $key => $value)
                <th class=" px-20 py-2 justify-center items-center bg-grey ">{{ strtoupper($key) }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($data as $index => $row)
            <tr>
                @foreach($row as $key => $value)
                <td class="p-2"
                    @if ($key==='Action' ) wire:click="openModal({{ $index }})"
                    @endif>
                    {!! $value !!}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($showModal)
    <div class=" mod absolute bottom-1/2 left-1/3 bg-white h-48 w-96 shadow-md ">
        <button wire:click="closeModal" class=" float-right">X</button>
        <p class=" text-lg pt-4 text-center">Are you sure you want to cancel this booking?</p>
        <div class="flex justify-around px-3 pt-1">
            <button wire:click="handleAction">YES</button>
            <button wire:click="closeModal">NO</button>
        </div>
    </div>
    @endif
</div>