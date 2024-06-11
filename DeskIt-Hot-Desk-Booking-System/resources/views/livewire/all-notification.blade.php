
<div class="flex justify-center">
    <div class="text-base w-[60%] bg-white p-10 shadow-md rounded-lg">
        @foreach ($notifications as $notification)
        <div class="{{ $notification->read_at ? 'bg-gray' : 'bg-white' }} p-3 mb-1 rounded-lg border border-2">
            <div class="text-block text-base">
                <div class="font-semibold pb-1"> {{ $notification->data['title'] }}</div>
                <div class="pb-1">{{ $notification->data['message'] }}</div>
                <div class="text-gray-500 pb-1"> {{($notification->created_at)->diffForHumans() }}</div>
            </div>
            <div class="flex justify-end">
                <button wire:click="markAsRead('{{ $notification->id }}')"
                    class="{{ $notification->read_at ? 'text-gray-500' : 'text-blue-500' }}">
                    Mark as Read
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>