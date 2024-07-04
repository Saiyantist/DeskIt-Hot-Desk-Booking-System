<div>
    <div class="w-[70%] mx-auto bg-gray m-0 px-4 pb-4 rounded-lg shadow-md element-selector">
        <header class='pt-4'>

            {{-- Issue --}}
            <div class="flex flex-row justify-between lift">

                {{-- Back and Issue Details --}}
                <div class="flex items-center gap-3">
                    <svg width="50" height="50" viewBox="0 0 291 479" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="cursor-pointer px-2 py-3 rounded-xl hover:bg-medgrey inverter"
                        {{-- wire:navigate --}}
                        onclick="goBack()"
                        ><path d="M8.08254 221.018L220.807 8.30422C231.063 -1.95167 247.7 -1.95167 257.956 8.30422L282.769 33.1175C293.014 43.3625 293.025 59.9558 282.813 70.2226L114.221 239.592L282.802 408.973C293.025 419.24 293.003 435.833 282.759 446.078L257.945 470.892C247.689 481.148 231.052 481.148 220.796 470.892L8.08254 258.167C-2.17335 247.911 -2.17335 231.274 8.08254 221.018Z" fill="black"/>
                    </svg>

                    {{-- Issue # and Desk # --}}
                    <span class="text-3xl font-bold">
                        Issue {{$issue->id}}   /
                    </span>
                    <span class="text-3xl font-semibold text-yellowB">
                        Desk {{$issue->desk->desk_num}}
                    </span>
                </div>

                {{-- Status Changer --}}
                <div class="self-center">
                    @if($issue->status == 'to review')
                    <select wire:model.live="status" wire:change="changeStatus" name="status" id="status" class="cursor-pointer hover:bg-yellow-400 shadow-sm p-2 px-4 rounded-lg text-center text-black font-semibold bg-yellow-200">
                        <option class="text-center mx-auto" value="to review" selected>to review</option>
                        <option class="text-center mx-auto" value="reviewing">reviewing</option>
                        <option class="text-center mx-auto" value="resolved">resolved</option>

                    @elseif($issue->status == 'reviewing')
                    <select wire:model.live="status" wire:change="changeStatus" name="status" id="status" class="cursor-pointer hover:bg-yellow-100 shadow-sm p-2 px-4 rounded-lg text-center text-yellow-900 font-semibold bg-yellow-400">
                        <option class="text-center mx-auto" value="to review">to review</option>
                        <option class="text-center mx-auto" value="reviewing" selected>reviewing</option>
                        <option class="text-center mx-auto" value="resolved">resolved</option>

                    @elseif($issue->status == 'resolved')
                    <select disabled name="status" id="status" class="shadow-sm p-2 px-4 rounded-lg text-center text-green-900 font-semibold bg-green-300">
                        <option class="text-center mx-auto" value="to review">to review</option>
                        <option class="text-center mx-auto" value="reviewing">reviewing</option>
                        <option class="text-center mx-auto" value="resolved" selected>resolved</option>
                    @endif

                    </select>
                </div>
            </div>
            
            {{-- Subject --}}
            <div class="my-3 p-4 bg-yellowLight items-center rounded-t-lg shadow-sm inverter">
                <span class="text-2xl font-semibold capitalize">{{$issue->subject}}</span>
            </div>
        </header>

        <main class="p-3 bg-white shadow-md">
            
            {{-- User Details --}}
            <div class="flex flex-column rounded-b-lg">
                <span class="text-md font-bold">
                    {{$issue->user->name}}
                </span>
                <span class="text-sm">
                    {{$dateTime}}
                </span>
            </div>

            <hr>

            {{-- Body --}}
            <div class="mt-4">
                <span class="text-lg font-semibold">
                    Description
                </span>
                <span class="block text-sm mt-2">
                    {{ $issue->description }}
                </span>
            </div>
        </main>
    </div>

    {{-- <h3>Responses</h3>
    <ul>
        @foreach ($issue->responses as $response)
            <li>{{ $response->content }}</li>
        @endforeach
    </ul>  --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>