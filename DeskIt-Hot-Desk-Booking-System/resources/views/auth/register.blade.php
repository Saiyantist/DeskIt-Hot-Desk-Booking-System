<x-guest-layout>
    <div class="flex flex-column justify-between">
        {{-- Heading --}}
        <div class="flex justify-center py-3">
            <h1 class="text-3xl font-semibold">Sign Up</h1>
        </div>

        {{-- Form --}}
        <div class="sm:rounded-lg px-6 py-3 bg-yellowA">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex flex-column gap-3">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
    
                    <!-- Email Address -->
                    <div class="">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
    
                    {{-- Gender and Birthday --}}
                    <div class="flex gap-3">
                        <!-- GENDER -->
                        <div class="flex flex-column w-[40%]">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" class="block mt-1 w-full rounded-md shadow-md">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
    
                        <!-- BIRTHDAY -->
                        <div class="flex flex-column flex-1">
                            <x-input-label for="birthday" :value="__('Birthday')" />
                            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required />
                            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                        </div>
                    </div>
    
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
    
                    <!-- Confirm Password -->
                    <div class="">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
    
                    {{-- Register Button and Already Registered --}}
                    <div class="flex items-center justify-end my-1">
                        <a class="underline text-sm hover:text-yellowBdarker rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
            
                        <x-primary-button class="ml-5 py-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
