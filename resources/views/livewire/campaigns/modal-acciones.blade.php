<div>
    <div class="flex text-right">
        <button wire:click="cambiamodalacciones()" class="mt-6 ml-8 text-blue-500 underline my-auto " type="button" data-modal-toggle="defaultModal">Acciones</button>

    </div>
    <x-modal.datos wire:model="muestramodalacciones" >
        <x-slot name="title">
            <span class="text-2xl font-semibold">{{ __('Acciones') }}</span>
        </x-slot>
        <x-slot name="content">
            <div class="flex w-full justify-between">
                @include('campaign.acciones')
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="text-left">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
