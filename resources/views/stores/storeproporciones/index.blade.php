<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Proporciones de la Store
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                {{-- @can('storeproporciones.create') --}}
                    {{-- @include('stores.storeproporciones.menu_storeproporciones') --}}
                {{-- @endcan --}}
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('stores.storeproporciones.proporciones')
            </div>
        </div>
    </div>
</x-app-layout>
