<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Elementos
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('storeelementos.create')
                    @include('elementos.menu_elementos')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                {{-- @include('elementos.elementos') --}}
            </div>
        </div>
    </div>
</x-app-layout>
