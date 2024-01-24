<x-app-layout>
    <div class="flex items-center justify-center flex-col">
        <!-- Cover Photo -->
       
            <div class="py-12 mt-24">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                       
                        <div class="max-w-xl">
                            <!-- User Information -->
                            <p>Name: {{ $user->name }}</p>
                        </div>
                        <div class="max-w-xl">
                            <!-- User Information -->
                            <p>Email: {{ $user->email }}</p>
                        </div>
                        <div class="max-w-xl">
                            <!-- User Information -->
                            <p>Gender: {{ $user->gender }}</p>
                        </div>
                        <div class="max-w-xl">
                            <!-- User Information -->
                            <p>Birthday: {{ $user->birthday }}</p>
                        </div>

                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                </div>
            </div>

           
        </div>
</x-app-layout>