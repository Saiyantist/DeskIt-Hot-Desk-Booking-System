<div class="flex justify-center">
    <div class="text-base w-[60%] bg-white p-10 shadow-md rounded-lg" wire:poll.5s>
        @foreach ($notifications as $notification)
        <div class="{{ $notification->read_at ? 'bg-gray' : 'bg-white' }} p-3 mb-1 rounded-lg border border-2">
            <div class="text-block text-base">
                <div class="font-semibold pb-1"> {{ $notification->data['title'] }}</div>
                <div class="pb-1">
                    {!! nl2br(e($notification->data['message'])) !!}
                </div>
                
                <div class="text-gray-500 pb-1"> {{($notification->created_at)->diffForHumans() }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            // Scroll to the bottom or anywhere you'd like after Livewire updates
            window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
        });
    });
</script>
@endpush --}}
