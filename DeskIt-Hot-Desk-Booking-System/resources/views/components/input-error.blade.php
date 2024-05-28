<!-- resources/views/components/input-error.blade.php -->
@if ($messages)

    <div class="flex-initial justify-end drop-shadow-md pt-3 text-center ">
        <div class="alert alert-warning border border-2 ml-6 w-69  ">
            <div class="flex justify-center">
                <img src="{{ asset('images/!.svg') }}"class="h-4 w-4 " alt="Password requirements icon">
            </div>
            <p class="text-xs">
                @foreach ($messages as $message)
                    {{ $message }}
                @endforeach
            </p>
        </div>
    </div>
@endif
