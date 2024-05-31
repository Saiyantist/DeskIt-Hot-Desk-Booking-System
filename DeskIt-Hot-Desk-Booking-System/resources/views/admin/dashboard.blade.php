@extends('layouts.adminlayout')

<x-app-layout>
    @section('content')
    @livewire('admin-dashboard')
    @livewireScripts
   
    <script src="{{ asset('js/myScript2.js') }}"></script>
    
    @endsection

</x-app-layout>