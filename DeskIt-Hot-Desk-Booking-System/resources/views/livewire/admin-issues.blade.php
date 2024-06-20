<div>
    {{-- <livewire:issues-table />
    @livewire('issues-table') --}}

    {{-- Dito ilalagay ang Powergrid Table--}}
    <div class="">
    <p class="">Issues</p> 


    <button class="flex items-center border-solid border-yellowB border-1 bg-yellowLight px-4 py-2 rounded-4 font-medium text-lg text-yellowBdarker"
        wire:click="show(5)"
        {{-- href="{{route('issue', ['id' => 1])}}" --}}
        {{-- x-on:click="$dispatch('close-modal')"> --}}
        >View one Issue
    </button>

    <div>
        {{-- <table class="bg-gray-200 mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td><a href="{{ route('issues.show', $issue->id) }}">{{ $issue->subject }}</a></td>
                        <td><a wire:click="show({{$issue->id}})">{{ $issue->subject }}</a></td>
                        <td>{{ $issue->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $issues->links() }} --}}
        <livewire:p-g-issues/>
    </div>

    </div>
</div>





