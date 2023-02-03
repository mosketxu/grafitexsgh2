{{-- @extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Elemento Editar')
@section('titlePag','Selección del elemento')
@section('navbar') --}}
{{-- @include('campaign._navbarcampaign') --}}
{{-- @endsection --}}




<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Detalle del Elemento
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('elemento.create')
                    {{-- @include('campaign.menu_campanya') --}}
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.elementos.elemento')
            </div>
        </div>
    </div>
</x-app-layout>
