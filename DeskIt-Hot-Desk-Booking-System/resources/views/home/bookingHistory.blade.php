@extends('layouts.layout')


<x-app-layout>
    
    @section('content')
    <livewire:user-dashboard-booking/> 
    @livewireScripts
    @powerGridSripts
    @endsection
</x-app-layout>