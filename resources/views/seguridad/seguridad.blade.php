<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Seguridad') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 xl:grid-cols-2">
                    @livewire('seguridad.usuarios')
                    @livewire('seguridad.destinatarios')
                    @livewire('seguridad.roles')
                    @livewire('seguridad.permisos')
                    @livewire('seguridad.configuracion')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
