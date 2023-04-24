<div>
    @include('errores')
        <x-input.filepond wire:model="imagenes" multiple/>

        {{-- <input type="file" wire:model="imagenes" multiple> --}}

        <x-button.primary wire:click="save" class="uppercase" >Guardar</x-button.primary>
</div>
