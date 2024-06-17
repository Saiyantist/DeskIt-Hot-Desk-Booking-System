@if (session('status') === 'password-updated')
    <div class="text-center mt-3 border border-gray-300 shadow-lg rounded-md py-4">
        <div class="flex justify-center">
            <img src="{{ asset('images/success.svg') }}" class="h-7 w-7" alt="Password requirements icon">
        </div>
        <p class="text-2xl">Successful</p>
        {{ __('Your password has been changed. Click continue to login.') }}

        <div class="flex justify-center mt-3">
            <a href="{{ route('login') }}" class="bg-amber-300 hover:bg-amber-400 text-gray-600 font-bold py-1 px-5 rounded">
                {{ __('Continue to Login') }}
            </a>
        </div>
    </div>
@endif
