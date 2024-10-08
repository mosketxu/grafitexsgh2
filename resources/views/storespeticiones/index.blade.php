<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Stores para peticiones
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                {{-- @can('stores.create')
                    @include('stores.menu_stores')
                @endcan --}}
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('stores-peticiones.stores-peticiones')
                {{-- @include('storespeticiones.stores') --}}
            </div>
        </div>
    </div>
</x-app-layout>
