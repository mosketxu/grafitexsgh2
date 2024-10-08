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
                        <div class="w-full">
                            <x-jet-label for="fechaentregatienda">Fecha Tienda</x-jet-label>
                            <x-input.text type="date" wire:model.defer="fechaentregatienda" class="w-full " id="fechaentregatienda" name="fechaentregatienda" :value="old('campaign_enddate') "/>
                        </div>
                    </div>
                </div>
                <div class="space-y-1 text-sm">
                    <div class="my-2 text-base text-blue-900 underline">Fechas Montaje</div>
                    <div class="flex items-center w-full space-x-2 ">
                        <x-jet-label for="campaign_name" class="w-1/12">Fecha</x-jet-label>
                        <x-input.text type="date" wire:model.defer="fechainstal1" class="w-7/12 py-1" id="fechainstal1" name="fechainstal1" :value="old('fechainstal1') "/>
                        <x-select  selectname="montaje1" wire:model.defer="montaje1" class="w-4/12 py-1.5 border-blue-300" id="montaje1">
                            <option value="">-Selecciona-</option>
                            <option value="M">Montaje</option>
                            <option value="D">Desmontaje</option>
                        </x-select>
                    </div>
                    <div class="flex items-center w-full space-x-2 ">
                        <x-jet-label for="campaign_name" class="w-1/12">Fecha</x-jet-label>
                        <x-input.text type="date" wire:model.defer="fechainstal2" class="w-7/12 py-1" id="fechainstal2" name="fechainstal2" :value="old('fechainstal2') "/>
                        <x-select  selectname="montaje2"  wire:model.defer="montaje2" class="w-4/12 py-1.5 border-blue-300" id="montaje2">
                            <option value="">-Selecciona-</option>
                            <option value="M">Montaje</option>
                            <option value="D">Desmontaje</option>
                        </x-select>
                    </div>
                    <div class="flex items-center w-full space-x-2 ">
                        <x-jet-label for="campaign_name" class="w-1/12">Fecha</x-jet-label>
                        <x-input.text type="date" wire:model.defer="fechainstal3" class="w-7/12 py-1" id="fechainstal3" name="fechainstal3" :value="old('fechainstal3') "/>
                        <x-select  selectname="montaje3"  wire:model.defer="montaje3" class="w-4/12 py-1.5 border-blue-300" id="montaje3">
                            <option value="">-Selecciona-</option>
                            <option value="M">Montaje</option>
                            <option value="D">Desmontaje</option>
                        </x-select>
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
            <div class="mt-2 text-left">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
