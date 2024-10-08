<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edición de la Store: {{ $store->id }} - {{ $store->name }}
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('stores.create')
                    @include('stores.menu_stores')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('stores.store')
            </div>
        </div>
    </div>
</x-app-layout>
