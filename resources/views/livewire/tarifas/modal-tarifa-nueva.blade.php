<div>
    <div class="flex w-full space-x-3">
        <button wire:click="cambiamodal()"
            class=" w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Nueva Tarifa
        </button>
    </div>
    <x-modal.datos wire:model="muestramodal" >
        <x-slot name="title">
            {{ __('Nueva Tarifa') }}
        </x-slot>
        <x-slot name="content">
            <form method="post" action="{{ route('tarifa.store') }}">
                @csrf
                <input type="hidden" name="tramo1" value="1" />
                <div class="space-y-2 text-sm">
                    <div class="w-full">
                        <x-jet-label for="campaign_name">Familia</x-jet-label>
                        <x-jet-input type="text" class="w-full" id="familia" name="familia" value="{{ old('familia') }}" />
                    </div>
                    <div class="flex space-x-1 ">
                        <div class="w-full">
                            <x-jet-label for="campaign_initdate">Tarifa</x-jet-label>
                            <x-jet-input type="number" step="0.01" class="w-full" id="tarifa1" name="tarifa1" value="{{ old('tarifa1') }}" />
                        </div>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodal()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    @can('campaign.create')
                    <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                        {{ __('Guardar') }}
                    </x-jet-button>
                    @endcan
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="mt-2 text-left">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
