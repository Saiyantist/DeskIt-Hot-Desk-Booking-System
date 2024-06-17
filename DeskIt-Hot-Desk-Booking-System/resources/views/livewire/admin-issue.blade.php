<div>
    <p>An Issue</p>
    <p>Lorem ipsum dolor sit amet.</p>
    {{-- <h1>{{ $issue->title }}</h1>
    <p>{{ $issue->description }}</p>

    <h2>Responses</h2>
    <ul>
        @foreach ($issue->responses as $response)
            <li>{{ $response->content }}</li>
        @endforeach
    </ul> --}}
    <button wire:click="hey">The Responses</button>
</div>