<section>
    
    @if (session('status') === 'password-updated')
    @include('profile.partials.success-change')
@else

    <header>
        <h2 class="text-lg font-medium text-bla">
            {{ __('Manage Password') }}
        </h2>

        <p class="mt-1 tex\
        t-sm text-gray-600 dark:text-gray-400">
            {{ __('Set the new password for your account so you can login and access all features.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12 flex">
                <div class="flex-1">
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                </div> 
                    <div class="flex-1">
                    <x-input-error :messages="$errors->updatePassword->get('current_password')"/>
                 </div>
                
            </div>

            <div class="col-md-12 flex">
                <div class="flex-1">
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 form-control" autocomplete="new-password" />
                </div>

                <div class="flex-1">
                    <x-input-error :messages="$errors->updatePassword->get('password')" />
                </div>
            </div>

            <div class="col-md-12 flex">
                <div class="flex-1">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 form-control" autocomplete="new-password" />
                </div>

                <div class="flex-1">
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
                </div>
            </div>

            <div class="relative justify-end">
                <a href="" class="mt-1 text-sm text-gray-600 dark:text-gray-400">Forget password</a>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="bg-amber-300 hover:bg-amber-400 text-gray-600 font-bold py-2 px-4 rounded-md">
                {{ __('Update Password') }}
            </button>
           
            @if (session('status') === 'profile-updated')
            
                @include('profile.partials.success-change') <hr>
        @endif
        </div>
    </form>
    @endif
</section>
