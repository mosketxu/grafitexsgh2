<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                {{-- <h2 class="text-xl font-semibold leading-tight text-gray-800">Campañas de la tienda <span class="text-blue-600"> {{ $store->id }} -{{ $store->name }} </span></h2> --}}
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('tienda.recepcion')
            </div>
        </div>
    </div>
</x-app-layout>
