<div class="rounded-lg">

    <div class="flex justify-center items-center mt-2 ">
        <div class="flex flex-col justify-center items-center mt-4 bg-white ml-16" style="width: 80%; border:1px solid rgba(128, 128, 128, 0.2);">
            <div class="self-start w-full p-2" style=" border-bottom: 1px solid rgba(128, 128, 128, 0.5);">
                <div class="flex ">
                    <div class="px-2 mt-2">
                        <h2 wire:click="setActiveSection(1)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 1 ? 'active-section' : '' }}">
                            Account Settings</h2>
                    </div>

                    <div class="px-4  mt-2">
                        <h2 wire:click="setActiveSection(2)"
                            class="justify-center text-xl rounded-t-lg cursor-pointer {{ $activeSection == 2 ? 'active-section' : '' }}">
                            Manage Users</h2>
                    </div>
                </div>

            </div>
                @if($activeSection ===1)
                <table class="w-75 p-10 justify-center items-center text-center bg-gray">
                    <thead>
                        <header></header>
                    </thead>
                </table>
                @endif
            <div>

            </div>
        </div>
    </div>

    @livewireScripts
    <script>
        // Automatically refresh the Livewire component every 1 second
                Livewire.emit('refresh');
    </script>
</div>