
    @livewireStyles 
    {{-- when logged in --}}
    @if(auth()->check())
        @include('partials.headNav')

        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('officemanager'))
            @include('layouts.adminNav')

        @elseif(Auth::user()->hasRole('employee'))
            @include('layouts.userNav')
        
        @endif 
        
        <main class="-mt-10">
            <section class="m-10">
                    @livewire('support-page', ['sectionNumber' => 1])
            </section>
        </main>
    
    {{-- when NOT logged in --}}
    @else
        @include('layouts.nav') {{-- Include nav2 when not logged in --}}
        <main>
            <section class="mb-20">
                @livewire('support-page', ['sectionNumber' => 1])
            </section>
        </main>

    @endif
    @livewireScripts
    