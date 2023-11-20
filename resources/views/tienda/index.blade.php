<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 mt-9">Bienvenido a la plataforma: {{$store->id}} {{$store->name}}</h2>
            </div>
            <div class="mx-2 mt-3">
                Selecciona el proceso al que quieres acceder
            </div>
        </div>
        <div class="p-2 mb-9">
            <div class="max-w-full mx-auto">
                <div class="flex space-x-4">
                    <x-button.primary
                        onclick="location.href = '{{ route('peticion.index' ) }}'">
                        Petición de material
                    </x-button.primary>

                    <x-button.buttongreen
                        onclick="location.href = '{{ route('tienda.recepcion' ) }}'">
                        Control de recepción
                </x-button.buttongreen>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
