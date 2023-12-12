<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Escaparate de la Store: {{ $store->id }} - {{ $store->name }}
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('storeescaparate.create')
                    {{-- @include('stores.storeescaparates.menu_storeescaparates') --}}
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('stores.storeescaparates.escaparate')
            </div>
        </div>
    </div>
</x-app-layout>
