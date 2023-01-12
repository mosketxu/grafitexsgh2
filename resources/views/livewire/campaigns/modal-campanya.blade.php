<div>
    <div class="flex space-x-3">
        <button wire:click="cambiamodal()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Nuevo
        </button>
    </div>
    <x-modal.datos wire:model="muestramodal" >
        <x-slot name="title">
            {{ __('Nueva Campaña') }}
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="save" class="">
                <div class="space-y-2 text-sm">
                    <div class="w-full">
                        <x-jet-label for="campaign_name">Campaña</x-jet-label>
                        <x-jet-input wire:model.defer="campaign_name" type="text" class="w-full " id="campaign_name" name="campaign_name" :value="old('campaign_name') "/>
                    </div>
                    <div class="flex space-x-1 ">
                        <div class="w-full">
                            <x-jet-label for="campaign_initdate">Fecha Inicio</x-jet-label>
                            <x-input.text type="date" wire:model.defer="campaign_initdate" class="w-full " id="campaign_initdate" name="campaign_initdate" :value="old('campaign_initdate') "/>
                        </div>
                        <div class="w-full">
                            <x-jet-label for="campaign_enddate">Fecha Finalización</x-jet-label>
                            <x-input.text type="date" wire:model.defer="campaign_enddate" class="w-full " id="campaign_enddate" name="campaign_enddate" :value="old('campaign_enddate') "/>
                        </div>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodal()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    @can('campaign.create')
                    <x-jet-button class="bg-blue-700 hover:bg-blue-900" >
                        {{ __('Guardar') }}
                    </x-jet-button>
                    @endcan
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="text-left mt-2">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
