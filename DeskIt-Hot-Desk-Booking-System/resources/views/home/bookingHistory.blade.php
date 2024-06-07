@extends('layouts.layout')


<x-app-layout>
    
    @section('content')
    <div class=" ml-40 mt-16">
        <div class="pt-10">
            <livewire:outside-filter-user /> 
        </div>
        
    </div>

    @endsection
</x-app-layout>