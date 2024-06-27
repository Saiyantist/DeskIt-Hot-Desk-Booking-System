<div class="">
    <div>
        <h3 class="text-base pt-4 px-4">Choose which notifications you want to receive and how you'd like to be notified.
            Please note that while you can manage most of your notification preferences, we will still send you
            important notifications about your account to ensure you stay informed about updates and security
            information.</h3>

    </div>
    <div class="m-10 border border-2 rounded-xl">
        <table>
            <thead class=" px-3 text-center text-base border-b bg-gray">
                <th class="p-2 border-r">Activity</th>
                <th class="p-2 border-r">Description</th>
                <th class="p-2 border-r"><i class="fa-solid fa-globe"></i> Deskit</th>
                <th class="p-2"><i class="fa-solid fa-envelope"></i> Email</th>
            </thead>
            <tbody class="px-3 text-center ">
                <tr class="border-b">
                    <td class="p-2 border-r font-medium"> Booking Reminders </td>
                    <td class="border-r"> These are notifications for your upcoming bookings.</td>
                    <td class="text-center border-r">
                        <i class="fa-solid fa-toggle-{{ $bookingRemindersDb ? 'on  text-green' : 'off text-darkgray' }} text-2xl" style="cursor: pointer;" wire:click="toggle('booking_reminders_db')"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa-solid fa-toggle-{{ $bookingRemindersEmail ? 'on  text-green' : 'off text-darkgray' }} text-2xl" style="cursor: pointer;" wire:click="toggle('booking_reminders_email')"></i>
                    </td>
                </tr>
                <tr>
                    <tr>
                        <td class="pt-2 border-r font-medium">Reserved Desk Status</td>
                        <td class="border-r">
                            {{-- blankspace by taylor swift --}}
                        </td>
                        <td class="border-r">
                    </td>
                        <td class="border-r"></td>
                    </tr>
                    <tr>
                        <td class="pl-4 border-r">Desk reservation approval</td>
                        <td class="border-r">These are notifications for confirmations of your approved bookings.</td>
                        <td class="border-r text-center">
                            <i class="fa-solid fa-toggle-{{ $reservedDeskStatusDb ? 'on  text-green' : 'off text-darkgray' }} text-2xl" style="cursor: pointer;" wire:click="toggle('reserved_desk_status_db')"></i>
                        </td>
                        <td class="border-r text-center">
                            <i class="fa-solid fa-toggle-{{ $reservedDeskStatusEmail ? 'on  text-green' : 'off text-darkgray' }} text-2xl" style="cursor: pointer;" wire:click="toggle('reserved_desk_status_email')"></i>
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-4 pb-2 border-r">Desk reservation Rejection</td>
                        <td class="pb-2 border-r">These are notifications for your rejected bookings.</td>
                        <td class="border-r">{{-- blankspace by taylor swift --}}</td>
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>

</div>


{{-- <div class="form-group">
    <label for="reservedDeskStatus">Reserved Desk Status</label>
    <i class="fa-solid fa-toggle-{{ $reservedDeskStatus ? 'on' : 'off' }}" style="cursor: pointer;"
        wire:click="toggle"></i>
</div> --}}