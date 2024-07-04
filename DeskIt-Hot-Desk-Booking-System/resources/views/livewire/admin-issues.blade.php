<div>
    {{-- Dito ilalagay ang Powergrid Table--}}
    <div class="bg-white shadow-md rounded-t-lg rounded-b-lg">
        <div class="py-4">
            <span class="text-3xl ml-10 font-semibold">Desk Issues</span> 
        </div>

        <section class="bg-gray rounded-b-lg">
            <div class="mx-auto max-w-screen-xl ">

                <div class="relative overflow-hidden">
                    <div class="flex items-center justify-between d p-4">
                        <div class="flex">
                            <input  type="text"
                                wire:model.live.debounce.200ms ='search'
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                        <div class="flex space-x-3">
                            <div class="flex space-x-3 items-center">
                                <label class="w-40 text-sm font-medium text-gray-900">Issue Type :</label>
                                <select 
                                    wire:model.live='type'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="">All</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="bug">Bug</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto px-3">
                        <table class="bg-white w-full text-sm text-left text-black dark:text-white">
                            <thead class="text-xs text-gray-700 uppercase bg-yellow-200">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-8" wire:click="setSortBy('id')">
                                        <button class="flex flex-row justify-center w-full">
                                            <span>ID</span>
                                            @if($sortBy !== 'id')
                                            <svg class="ml-2 w-4 h-4" viewBox="0 0 36 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 28.8572H32.7309C35.4037 28.8572 36.74 32.092 34.8541 33.9779L19.9915 48.8405C18.8175 50.0145 16.9191 50.0145 15.7576 48.8405L0.882474 33.9779C-1.00345 32.092 0.332932 28.8572 3.0057 28.8572ZM34.8541 15.7431L19.9915 0.880515C18.8175 -0.293505 16.9191 -0.293505 15.7576 0.880515L0.882474 15.7431C-1.00345 17.629 0.332932 20.8638 3.0057 20.8638H32.7309C35.4037 20.8638 36.74 17.629 34.8541 15.7431Z" fill="black"/>
                                            </svg>
                                            @elseif($sorting === 'ASC')
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.7344 20.8661H3.00603C0.332968 20.8661 -1.00356 17.6309 0.882569 15.7448L15.7468 0.88061C16.9209 -0.293537 18.8195 -0.293537 19.9812 0.88061L34.8454 15.7448C36.744 17.6309 35.4075 20.8661 32.7344 20.8661Z" fill="black"/>
                                            </svg>
                                            @else
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 0H32.7309C35.4037 0 36.74 3.2348 34.8541 5.12073L19.9915 19.9833C18.8175 21.1573 16.9191 21.1573 15.7576 19.9833L0.882474 5.12073C-1.00345 3.2348 0.332932 0 3.0057 0Z" fill="black"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3 w-26" wire:click="setSortBy('desk_id')">
                                        <button class="flex flex-row justify-center w-full">
                                            <span>Desk #</span>
                                            @if($sortBy !== 'desk_id')
                                            <svg class="ml-2 w-4 h-4" viewBox="0 0 36 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 28.8572H32.7309C35.4037 28.8572 36.74 32.092 34.8541 33.9779L19.9915 48.8405C18.8175 50.0145 16.9191 50.0145 15.7576 48.8405L0.882474 33.9779C-1.00345 32.092 0.332932 28.8572 3.0057 28.8572ZM34.8541 15.7431L19.9915 0.880515C18.8175 -0.293505 16.9191 -0.293505 15.7576 0.880515L0.882474 15.7431C-1.00345 17.629 0.332932 20.8638 3.0057 20.8638H32.7309C35.4037 20.8638 36.74 17.629 34.8541 15.7431Z" fill="black"/>
                                            </svg>
                                            @elseif($sorting === 'ASC')
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.7344 20.8661H3.00603C0.332968 20.8661 -1.00356 17.6309 0.882569 15.7448L15.7468 0.88061C16.9209 -0.293537 18.8195 -0.293537 19.9812 0.88061L34.8454 15.7448C36.744 17.6309 35.4075 20.8661 32.7344 20.8661Z" fill="black"/>
                                            </svg>
                                            @else
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 0H32.7309C35.4037 0 36.74 3.2348 34.8541 5.12073L19.9915 19.9833C18.8175 21.1573 16.9191 21.1573 15.7576 19.9833L0.882474 5.12073C-1.00345 3.2348 0.332932 0 3.0057 0Z" fill="black"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col" class="px-4 py-3 w-auto" wire:click="setSortBy('name')">
                                        <button class="flex flex-row justify-center w-full">
                                            <span>Name</span>
                                            @if($sortBy !== 'name')
                                            <svg class="ml-2 w-4 h-4" viewBox="0 0 36 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 28.8572H32.7309C35.4037 28.8572 36.74 32.092 34.8541 33.9779L19.9915 48.8405C18.8175 50.0145 16.9191 50.0145 15.7576 48.8405L0.882474 33.9779C-1.00345 32.092 0.332932 28.8572 3.0057 28.8572ZM34.8541 15.7431L19.9915 0.880515C18.8175 -0.293505 16.9191 -0.293505 15.7576 0.880515L0.882474 15.7431C-1.00345 17.629 0.332932 20.8638 3.0057 20.8638H32.7309C35.4037 20.8638 36.74 17.629 34.8541 15.7431Z" fill="black"/>
                                            </svg>
                                            @elseif($sorting === 'ASC')
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.7344 20.8661H3.00603C0.332968 20.8661 -1.00356 17.6309 0.882569 15.7448L15.7468 0.88061C16.9209 -0.293537 18.8195 -0.293537 19.9812 0.88061L34.8454 15.7448C36.744 17.6309 35.4075 20.8661 32.7344 20.8661Z" fill="black"/>
                                            </svg>
                                            @else
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 0H32.7309C35.4037 0 36.74 3.2348 34.8541 5.12073L19.9915 19.9833C18.8175 21.1573 16.9191 21.1573 15.7576 19.9833L0.882474 5.12073C-1.00345 3.2348 0.332932 0 3.0057 0Z" fill="black"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-center w-96">Subject</th>
                                    <th scope="col" class="px-4 py-3" wire:click="setSortBy('created_at')">
                                        <button class="flex flex-row justify-center w-full">
                                            <span>Date Reported</span>
                                            @if($sortBy !== 'created_at')
                                            <svg class="ml-2 w-4 h-4" viewBox="0 0 36 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 28.8572H32.7309C35.4037 28.8572 36.74 32.092 34.8541 33.9779L19.9915 48.8405C18.8175 50.0145 16.9191 50.0145 15.7576 48.8405L0.882474 33.9779C-1.00345 32.092 0.332932 28.8572 3.0057 28.8572ZM34.8541 15.7431L19.9915 0.880515C18.8175 -0.293505 16.9191 -0.293505 15.7576 0.880515L0.882474 15.7431C-1.00345 17.629 0.332932 20.8638 3.0057 20.8638H32.7309C35.4037 20.8638 36.74 17.629 34.8541 15.7431Z" fill="black"/>
                                            </svg>
                                            @elseif($sorting === 'ASC')
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.7344 20.8661H3.00603C0.332968 20.8661 -1.00356 17.6309 0.882569 15.7448L15.7468 0.88061C16.9209 -0.293537 18.8195 -0.293537 19.9812 0.88061L34.8454 15.7448C36.744 17.6309 35.4075 20.8661 32.7344 20.8661Z" fill="black"/>
                                            </svg>
                                            @else
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 0H32.7309C35.4037 0 36.74 3.2348 34.8541 5.12073L19.9915 19.9833C18.8175 21.1573 16.9191 21.1573 15.7576 19.9833L0.882474 5.12073C-1.00345 3.2348 0.332932 0 3.0057 0Z" fill="black"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col" class="px-4 py-3" wire:click="setSortBy('status')">
                                        <button class="flex flex-row justify-center w-full">
                                            <span>Status</span>
                                            @if($sortBy !== 'status')
                                            <svg class="ml-2 w-4 h-4" viewBox="0 0 36 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 28.8572H32.7309C35.4037 28.8572 36.74 32.092 34.8541 33.9779L19.9915 48.8405C18.8175 50.0145 16.9191 50.0145 15.7576 48.8405L0.882474 33.9779C-1.00345 32.092 0.332932 28.8572 3.0057 28.8572ZM34.8541 15.7431L19.9915 0.880515C18.8175 -0.293505 16.9191 -0.293505 15.7576 0.880515L0.882474 15.7431C-1.00345 17.629 0.332932 20.8638 3.0057 20.8638H32.7309C35.4037 20.8638 36.74 17.629 34.8541 15.7431Z" fill="black"/>
                                            </svg>
                                            @elseif($sorting === 'ASC')
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.7344 20.8661H3.00603C0.332968 20.8661 -1.00356 17.6309 0.882569 15.7448L15.7468 0.88061C16.9209 -0.293537 18.8195 -0.293537 19.9812 0.88061L34.8454 15.7448C36.744 17.6309 35.4075 20.8661 32.7344 20.8661Z" fill="black"/>
                                            </svg>
                                            @else
                                            <svg class="ml-2 w-3 h-3" viewBox="0 0 36 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.0057 0H32.7309C35.4037 0 36.74 3.2348 34.8541 5.12073L19.9915 19.9833C18.8175 21.1573 16.9191 21.1573 15.7576 19.9833L0.882474 5.12073C-1.00345 3.2348 0.332932 0 3.0057 0Z" fill="black"/>
                                            </svg>
                                            @endif
                                        </button>
                                    </th>
                                    {{-- <th scope="col" class="px-4 py-3 text-center">
                                        <span class="sr-only">Action</span>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if($issues)
                                    @foreach($issues as $issue)
                                    <tr class="border-b dark:border-gray-700 hover:bg-yellowLight cursor-pointer"
                                        wire:navigate
                                        href="{{ route('admin.issue', ['issueId' => $issue->id]) }}"
                                        >
                                        <th scope="row"
                                            class="px-4 py-3 text-center font-medium whitespace-nowrap text-yellowBdarker">
                                            {{ $issue->id}}</th>
                                        <td class="px-4 py-3 text-center">{{ $issue->desk->desk_num }}</td>
                                        <td class="px-4 py-3 text-center max-w-60 truncate ...">{{ $issue->user->name }}</td>
                                        <td class="px-4 py-3 text-center max-w-80 truncate ...">{{ $issue->subject }}</td>
                                        <td class="px-4 py-3 text-center">{{ $issue->created_at }}</td>
                                        @if($issue->status == 'to review')
                                        <td class="px-4 py-3 text-center text-darkgray">{{ $issue->status }}</td>
                                        @elseif($issue->status == 'reviewing')
                                        <td class="px-4 py-3 text-center font-bold text-yellowB italic">{{ $issue->status }}</td>
                                        @elseif($issue->status == 'resolved')
                                        <td class="px-4 py-3 text-center font-bold text-green">{{ $issue->status }}</td>
                                        @endif
                                        {{-- <td class="px-4 py-3 text-center flex items-center justify-end">
                                            <button class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    wire:model.live='perPage'
                                    >
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{ $issues->links('vendor.pagination.custom-pagination')}}
                    </div>
                </div>
            </div>
        </section>

    </div>
    {{-- Azhelle PG --}}
    {{-- <livewire:p-g-issues/> --}}
</div>





