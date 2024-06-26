<section>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <header>
        <h2 class="text-2xl font-semibold text-black">
            {{ __('Manage Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Set the new password for your account so you can login and access all features.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" wire:submit.prevent="updatePassword">
        @csrf
        @method('put')

        {{-- current password --}}
        <div class="row">
            <div class="col-md-12 flex">
                <div class="flex-1">
                  <label for="current_password">Current Password</label>
                  <input type="password" id="current_password" wire:model.defer="current_password" class="form-control">
                </div>

                <div class="flex-1 ml-3 mt-3">
                  @error('current_password')
                    <div class="alert alert-warning flex items-center py-2 px-4 rounded shadow-md text-sm" role="alert">
                      <span class="mr-2">
                        <img src="{{ asset('images/!.svg') }}" class="h-5 w-5" alt="Password requirements icon">
                      </span>
                      {{ $message }}
                    </div>
                  @enderror
                </div>
             
            </div>

            {{-- new password --}}
            <div class="col-md-12 flex">
                <div class="flex-1">
                    <label for="password">New Password</label>
                    <input type="password" id="password" wire:model.defer="password" class="form-control mt-1">
                </div>

                <div class="flex-1 ml-3 mt-3">
                    @error('password')
                      <div class="alert alert-warning flex items-center py-2 px-4 rounded shadow-md text-sm" role="alert">
                        <span class="mr-2">
                          <img src="{{ asset('images/!.svg') }}" class="h-6 w-6" alt="Password requirements icon">
                        </span>
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

            </div>

            {{-- confirm new password --}}
            <div class="col-md-12 flex">
                <div class="flex-1">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation" class="form-control mt-1">
                    
                </div>

                <div class="flex-1 ml-3 mt-3">
                    @error('password_confirmation')
                      <div class="alert alert-warning flex items-center py-2 px-4 rounded shadow-md text-sm" role="alert">
                        <span class="mr-2">
                          <img src="{{ asset('images/!.svg') }}" class="h-6 w-6" alt="Password requirements icon">
                        </span>
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
            </div>

        {{-- submit button --}}
        <div class="mt-3">
            <button wire:submit wire:click='updatePassword' class="bg-amber-300 hover:bg-amber-400 text-gray-600 font-bold py-2 px-4 rounded-md">
                Update Password
            </button>
        </div>
    </form>
</section>
