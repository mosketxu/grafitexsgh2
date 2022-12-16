<div>
    <div class="flex space-x-3">
        <button wire:click="cambiamodalsgh()"
            class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Fichero SGH
        </button>
        <button wire:click="cambiamodalactualizatablassgh()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Actualizar tablas SGH
        </button>
        <button wire:click="cambiamodalactualizatiendas()"
            class="block text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Actualizar tiendas
        </button>
        <button wire:click="cambiamodalinsertastores()"
            class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Inserta Store Elementos
        </button>
    </div>

    {{-- Modal fichero SGH --}}
    <x-modal.dialog wire:model="muestramodalsgh">
        <x-slot name="title">
            {{ __('Nueva importacion de maestro original SGH') }}
        </x-slot>
        <x-slot name="content">
            <form id="formularioSGH" role="form" method="post" action="{{ route('maestro.import','SGH') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label>Selecciona el fichero</label>
                        <input type="file" class="form-control form-control-sm" id="maestro" name="maestro" value=""/>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodalsgh()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    <x-jet-button type="submit" class="bg-green-700 hover:bg-green-900" >
                        {{ __('Subir Maestro SGH') }}
                    </x-jet-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-modal.dialog>
    {{-- Modal actualiza tablas  SGH --}}
    <x-modal.dialog wire:model="muestraactualizatablassgh">
        <x-slot name="title">
            {{ __('Actualiza las tablas principales con fichero SGH') }}
        </x-slot>
        <x-slot name="content">
            <form id="formularioSGH" role="form" method="get" action="{{ route('maestro.actualizatablas','Grafitex') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label>Pulse actualizar para continuar</label>
                        <input type="file2" class="form-control form-control-sm" id="maestro2" name="maestro2" value=""/>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodalactualizatablassgh()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    <x-jet-button type="submit" class="bg-green-700 hover:bg-green-900" >
                        {{ __('Actualizar con fichero SGH') }}
                    </x-jet-button>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-modal.dialog>
    <x-modal.dialog wire:model="muestractualizatiendas">
        <x-slot name="title">
            {{ __('Tiendas') }}
        </x-slot>

        <x-slot name="content">
            <form id="formularioSGH" role="form" method="post" action="{{ route('maestro.import','SGH') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label>Selecciona el fichero</label>
                        <input type="file" class="form-control form-control-sm" id="maestro" name="maestro" value=""/>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodalsgh()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    <x-jet-button type="submit" class="bg-green-700 hover:bg-green-900" >
                        {{ __('Subir Maestro SGH') }}
                    </x-jet-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-modal.dialog>
    <x-modal.dialog wire:model="muestrainsertastore">
        <x-slot name="title">
            {{ __('store') }}
        </x-slot>
        <x-slot name="content">
            <form id="formularioSGH" role="form" method="post" action="{{ route('maestro.import','SGH') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label>Selecciona el fichero</label>
                        <input type="file" class="form-control form-control-sm" id="maestro" name="maestro" value=""/>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodalsgh()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    <x-jet-button type="submit" class="bg-green-700 hover:bg-green-900" >
                        {{ __('Subir Maestro SGH') }}
                    </x-jet-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-modal.dialog>
</div>


