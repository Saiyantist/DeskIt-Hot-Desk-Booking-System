<x-guest-layout>

    <div class="sm:rounded-lg px-6 pb-4 pt-3 bg-yellowA">

        {{-- Heading --}}
        <div class="flex justify-start py-2">
            <h1 class="text-2xl font-semibold">Verify Email</h1>
        </div>

        {{-- Body Text --}}
        <div class="mb-4 text-md text-gray-900 font-light">
            {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>   

        {{-- New Body Text  --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-md text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="mr-2 underline text-sm hover:text-yellowBdarker rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

    </div>
</x-guest-layout>
