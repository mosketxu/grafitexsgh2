<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Productos para peticiones de la Store: {{$store->id}} - {{$store->name}}
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('storeelementos.create')
                    @include('storespeticiones.menu_storeproductos')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('stores-peticiones.store-productos',['store'=>$store],key($store->id))
            </div>
        </div>
    </div>
</x-app-layout>
