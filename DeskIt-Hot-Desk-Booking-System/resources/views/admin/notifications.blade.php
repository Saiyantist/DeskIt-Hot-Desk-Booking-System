@extends('layouts.adminlayout')
<x-app-layout>
    @section('content')
    <main class=" ml-20 mt-16">
        <div class="flex justify-between">
            <h1 class=" d-flex justify-start text-2xl pl-10 py-10">Notifications</h1>
            
        </div>
        <section>

            @livewire('all-notification')
            
        </section>
    </main>
    @livewireScripts
    @endsection

</x-app-layout>