<x-guest-layout>
    <div class="sm:rounded-lg px-6 py-3 bg-yellowA">
        {{-- Heading --}}
        <div class="flex justify-start py-3">
            <h1 class="text-2xl font-semibold">Forgot your password?</h1>
        </div>
        <div class="mb-4 text-md text-gray-900 font-light">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-yellowB" :status="session('status')" />

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>


    </div>

</x-guest-layout>
