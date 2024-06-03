
@livewireStyles 
    
@if(auth()->check())
        <link rel="stylesheet" href="/css/stylesAdminSidebar.css">
        @include('partials.headNav')
        @include('layouts.adminNav') 
        <main class="-mt-10">
            <section class="m-10">
                    @livewire('support-page', ['sectionNumber' => 3])
            </section>
        </main>
    
    {{-- when NOT logged in --}}
    @else
        @include('layouts.nav') {{-- Include nav2 when not logged in --}}
        <main>
            <section class="mb-20">
                @livewire('support-page', ['sectionNumber' => 3])
            </section>
        </main>

    @endif
@livewireScripts
