<div x-data="{ showModal: false }" wire:poll="updateNotification">
    {{-- Navigation Bell Button--}}
    @php
    $currentRoute = Route::currentRouteName();
@endphp

    <button 
        {{-- wire:click="updateNotification"  --}}
        type="button" 
        class="flex relative"
        @click="showModal = true"
        @if($currentRoute === 'notification' || $currentRoute === 'userNotification') disabled @endif
    >
        <i class="fa-regular fa-bell @if($currentRoute === 'notification' || $currentRoute === 'userNotification') fa-solid fa-bell text-yellowB  bg-gray-100 p-1.5 px-2.5 rounded-full @endif"></i>

        @if(!($currentRoute === 'notification' || $currentRoute === 'userNotification'))
            <h6 class="ml-1 border border-2 border-blue px-1 rounded-md text-xs">{{ $unreadCount }}</h6>
        @endif
    </button>


    {{-- Modal --}}
    <div class="fixed right-0 z-10" x-show="showModal" @click.away="showModal = false" x-cloak>
        <div class="flex items-end justify-center px-4 pb-20 text-center sm:block sm:p-0">

            {{-- Modal Panel --}}
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-y-auto shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full border border-2 max-h-screen" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-2 pt-4 pb-4 sm:pb-4">
                    {{-- Modal content --}}
                    <div class="sm:flex sm:items-start max-h-96">
                        <div class="text-left sm:px-4 w-96">
                            {{-- Modal header --}}
                            <div class="flex justify-between">  
                                <h3 class="text-lg font-medium text-gray-900" id="modal-headline">
                                    Notification
                                </h3>
                                <div x-data="{ showModal1: false }" class="relative">
                                    <a @click="showModal1 = !showModal1" class=" cursor-pointer text-block">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <div x-show="showModal1" @click.away="showModal1 = false" x-cloak class="absolute bg-white shadow-sm p-3 right-6 top-0 w-max rounded-lg">
                                        <div class="flex flex-col">
                                            <a wire:navigate href="{{ Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin') ? route('notification') : route('userNotification') }}" class="text-block pb-1 text-sm no-underline"><i class="fa-regular fa-eye text-sm"></i> See all</a>
                                            @if(Auth::user()->roles->where('name', 'employee')->isNotEmpty())
                                                <a wire:navigate href="{{route('userProfileSetting')}}" class="text-block text-sm no-underline"><i class="fa-solid fa-gear text-sm"></i> Notification settings</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-base mb-2">
                                <button wire:click="markAllAsRead" class=" text-yellowB mr-3">
                                    Mark All as Read
                                </button>
                                <button wire:click="clearAll" class=" text-red">
                                    Clear All
                                </button>
                            </div>

                            {{-- notification content--}}
                            @if($showNotifications)
                                                                
                                <div class="text-base">
                                    @foreach ($notifications as $notification)
                                    <div class="{{ $notification->read_at ? 'bg-gray' : 'bg-white' }} p-3 mb-1 rounded-lg border border-b-2">
                                        <div class="text-block text-base">
                                            <div class="font-semibold pb-1"> {{ $notification->data['title'] }}</div>
                                            <div class="pb-1">
                                                {!! nl2br(e($notification->data['message'])) !!}
                                            </div>
                                            
                                            <div class="text-gray-500 pb-1"> {{($notification->created_at)->diffForHumans() }}</div>
                                        </div>
                                        <div class="flex justify-end">
                                            @if($notification)
                                                @if(is_null($notification->read_at))
                                                    <button wire:click="markAsRead('{{ $notification->id }}')"
                                                        class="text-blue-500">
                                                        Mark as Read
                                                    </button>
                                                @else
                                                    <button wire:click="markAsUnread('{{ $notification->id }}')"
                                                        class="text-gray-500">
                                                        Mark as Unread
                                                    </button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" @click="showModal = false">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
