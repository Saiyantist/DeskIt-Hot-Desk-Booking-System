@if ($showConfirmation)
<div id="Modal" class="flex flex-column justify-start bg-yellowB rounded-4 absolute h-48 w-72">
    
    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">Are you sure you want to DISABLE this desk?</p>
        </div>

        <div class="flex justify-center">
            <p class="text-lg text-center">Desk: {{$selectedDesk}}</p>
        </div>

        <div class="flex justify-center">
            <button class="bg-secondary px-6 py-2 rounded-4 mt-3 text-white font-black"
                wire:click="setDeskAvailability">
                DISABLE
            </button>
        </div>
    </div>
    
</div>
@endif

@if ($showNotification)
<div id="Modal" class="flex flex-column justify-start bg-yellowB rounded-4 absolute h-48 w-72">
    
    <div class='self-end my-1 mr-4 '>
        <button class="font-bold" wire:click="closeModal">X</button>
    </div>

    <div class='flex flex-column bg-white py-4 px-2.5'>
        <div class='flex justify-center'>
            <p class=" text-lg text-center">Desk Successfully Disabled!</p>
            
        </div>

        <div class="flex justify-center">
            <p class="bg-yellowA mx-2 p-1 rounded-2 text-lg text-center">Related bookings were set to CANCELED!</p>
        </div>
    </div>
</div>
@endif

@if ($showEnableModal)
    <div id="Modal" class="flex flex-column justify-start bg-yellowB rounded-4 absolute h-48 w-72">
        
        <div class='self-end my-1 mr-4 '>
            <button class="font-bold" wire:click="closeModal">X</button>
        </div>

        <div class='flex flex-column bg-white rounded-bottom-4 py-4 px-2.5'>
            <div class='flex justify-center'>
                <p class=" text-lg text-center">ENABLE this desk?</p>
            </div>

            <div class="flex justify-center">
                <p class="text-lg text-center">Desk: {{$selectedDesk}}</p>
            </div>
    
            <div class="flex justify-center">
                <button class="bg-green px-6 py-2 rounded-4 mt-3 text-white font-black"
                    wire:click="setDeskAvailability">
                    Enable
                </button>
            </div>
        </div>
    
    </div>
    @endif

    @if ($showEnabledNotification)
    <div id="Modal" class="flex flex-column justify-start bg-yellowB rounded-4 absolute h-48 w-72">
        
        <div class='self-end my-1 mr-4 '>
            <button class="font-bold" wire:click="closeModal">X</button>
        </div>

        <div class='flex flex-column bg-white py-4 px-2.5'>
            <div class='flex justify-center'>
                <p class=" text-lg text-center">Desk Successfully Enabled!</p>
                
            </div>
    
            <div class="flex justify-center">
                <p class="bg-yellowA mx-2 p-1 rounded-2 text-lg text-center">Related CANCELED bookings were set back to ACCEPTED!</p>
            </div>
        </div>
    </div>
    @endif