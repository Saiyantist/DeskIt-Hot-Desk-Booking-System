@extends('layouts.adminlayout')

<x-app-layout>
    @section('content')
    @livewire('admin-booking')
    @livewireScripts
   
    <script src="{{ asset('js/myScript2.js') }}"></script>
    
    @endsection

</x-app-layout>