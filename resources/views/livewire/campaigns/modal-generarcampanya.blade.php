<div>
    <div class="flex space-x-3">
        <button wire:click="cambiamodal()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Generar Campaña
        </button>
    </div>
    <x-modal.datos wire:model="muestramodal">
        <x-slot name="title">
            {{ __('Generar Campaña') }}
        </x-slot>
        <x-slot name="content">
            <div class="">
                <div class="space-y-3 text-base ">
                    <p>Pulsar <span class="bg-blue-600 rounded-md text-white px-2">Nueva Campaña</span></a> para comenzar de 0.</p>
                    <p>Pulsar <span class="bg-green-600 rounded-md text-white px-2">Añadir Elemento</span></a> para añadir nuevos elementos.</p>
                    <p>Pulsar <span class="bg-gray-600 rounded-md text-white px-2">Cerrar</span></a> para cancelar.</p>
                </div>
            </div>
            <div class="">
                @include('errores')
            </div>
        </x-slot>
        <x-slot name="footer" class="bg-white">
            <div class="bg-white m-0 p-0">
                <div class="flex space-x-3 flex-row-reverse">
                    <x-button type="button" wire:click="cambiamodal()"
                        title="Cerrar formulario" class="bg-gray-600 rounded-md text-white px-2"
                        name="Generar">Cerrar</x-button>
                    <form id="formularioMas" method="post"
                        action="{{route('campaign.generar',['1',$campaign->id]) }}">
                        @csrf
                        <x-button type="submit"
                        title="Añadir Elementos a la Campaña" class="bg-green-600 rounded-md text-white px-2"
                        name="Generar">Añadir Elementos</x-button>
                    </form>
                    <form method="post"
                        action="{{route('campaign.generar',['0',$campaign->id]) }}">
                        @csrf
                        <x-button type="submit"
                            title="Generar Nueva Campaña" class="bg-blue-600 rounded-md text-white px-2"
                            name="Generar">Nueva Campaña</x-button>
                    </form>
                </div>

        </x-slot>
    </x-modal.datos>
</div>
