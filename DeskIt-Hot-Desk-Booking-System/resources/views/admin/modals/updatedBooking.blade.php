
{{-- @if ($showConfirmation)
<div id="Modal" class="flex flex-column justify-start bg-green rounded-4 absolute h-48 w-72">

    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">Are you sure you want to book?</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-green px-6 py-2 rounded-4 mt-3 text-white" wire:click="book">
                Book
            </button>
        </div>
    </div>

</div>
@endif --}}

{{-- @if ($showNotification)
<div id="Modal" class="flex flex-column justify-start bg-yellowB rounded-4 absolute h-48 w-72">

    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">Desk Booked Successfully!</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-yellowB px-6 py-2 rounded-4 mt-3 text-white" wire:click="goHome">
                Go to Home
            </button>
        </div>
    </div>

</div>
@endif --}}

{{-- @if ($showWarning)
<div id="Modal" class="flex flex-column justify-start bg-danger rounded-4 absolute h-48 w-72">

    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5 rounded-bottom-4'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">You cannot book 2 DESKS on the SAME DAY!</p>
        </div>

        <div class="flex flex-column justify-center">
            <p class=" text-base text-center">Desk: {{$userBooking[count($userBooking) - 1]['desk_num']}}</p>
            <p class=" text-base text-center">Booking: {{$userBooking[count($userBooking) - 1]['booking_date']}}</p>
        </div>
    </div>

</div>
@endif --}}

{{-- @if ($showWarning2)
<div id="Modal" class="flex flex-column justify-start bg-danger rounded-4 absolute h-48 w-72">

    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">This desk is Booked</p>
        </div>

        <div class="flex flex-column  justify-center">
            <p class="text-lg text-center">Desk: {{$bookedDesk}}</p>
        </div>
    </div>
</div>
@endif --}}

{{-- for book on behalf --}}
{{-- @if ($showWarning3)
<div id="Modal" class="flex flex-column justify-start bg-danger rounded-4 absolute h-48 w-72">

    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">Please select a user you want to book for</p>
        </div>

        <div class="flex flex-column  justify-center">
            <p class="text-lg text-center"> User: empty</p>
        </div>
    </div>
</div>
@endif --}}