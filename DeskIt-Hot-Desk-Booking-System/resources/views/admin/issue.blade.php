@extends('layouts.adminlayout')


<x-app-layout>
    @section('content')
    <main class='ml-[4.5rem] mt-[4rem] px-20 py-5'>
        {{-- @livewire('admin-issue', :issueId="$issueId" ) --}}
        <livewire:admin-issue :issueId="$issueId"/>
        @livewireScripts
    </main>
    @endsection
</x-app-layout>
