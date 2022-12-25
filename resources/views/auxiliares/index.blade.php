<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full">
            <div class=" w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Tablas Auxiliares
                </h2>
            </div>
            <div class="w-10/12">
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('auxiliares.auxiliar-mostrar')
            </div>
        </div>
    </div>
</x-app-layout>
