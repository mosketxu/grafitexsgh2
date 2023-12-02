<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Tipos Tienda
                </h2>
            </div>
            <div class="flex flex-row-reverse w-10/12">
                @can('entidad.create')
                    @include('tiendatipo.menu_tiendatipo')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('tienda-tipo.tienda-tipos')
            </div>
        </div>
    </div>
</x-app-layout>
