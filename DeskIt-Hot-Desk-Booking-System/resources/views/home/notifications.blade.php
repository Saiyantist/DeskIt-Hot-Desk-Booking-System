@extends('layouts.layout')
<x-app-layout>
    @section('content')
    <main class=" ml-20 mt-16">
        <div class="flex justify-between px-10 py-10">
            <h1 class=" d-flex justify-start text-2xl">Notifications</h1>
            <div>
                <a wire:navigate href="{{route('userProfileSetting')}}" class="text-block no-underline text-xl"><i class="fa-solid fa-gear text-2xl"></i> Notification settings</a>
            </div>
        </div>
        <section>
            @livewire('all-notification')
        </section>
    </main>
    @livewireScripts
    @endsection

</x-app-layout>