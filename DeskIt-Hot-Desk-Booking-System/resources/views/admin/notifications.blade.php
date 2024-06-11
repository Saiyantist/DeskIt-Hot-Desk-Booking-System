@extends('layouts.adminlayout')
<x-app-layout>
    @section('content')
    <main class=" ml-20 mt-16">
        <h1 class=" d-flex justify-start text-xl">Notifications</h1>
        <section>

            @livewire('all-notification')
            
        </section>
    </main>
    @livewireScripts
    @endsection

</x-app-layout>