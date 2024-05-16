<x-guest-layout>    
    <div class="flex flex-column justify-between">
        {{-- Heading --}}
        <div class="flex justify-center py-3">
            <h1 class="text-3xl font-semibold">Log In</h1>
        </div>

        {{-- Form --}}
        <div class="sm:rounded-lg px-6 py-4 bg-yellowA">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> 
        
                <!-- Remember Me -->
                <div class="px-1 mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>
        
                <!-- Log In -->
                <div class="flex justify-center items-center ">
                    <button class="mt-4 bg-yellowB hover:bg-yellowlight rounded-xl py-2 w-full">
                        {{ __('Log In') }}
                    </button>       
                </div>

                <div class="flex items-center justify-between px-2 mt-3">   
                    {{-- Register here --}}
                    <a class="underline text-sm hover:text-yellowBdarker rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                        Register here
                    </a>
                    
                    {{-- Forgot Password --}}
                    <a class="underline text-sm hover:text-yellowBdarker rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
        
            </form>
        </div>
    </div>
</x-guest-layout> 
