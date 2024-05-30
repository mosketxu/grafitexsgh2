<div class="">
    <div class="flex items-center w-full py-1 space-x-2 text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
        <div class="w-6/12">
            <x-input.textred class="py-1 " type="text" id="elementofaltante" name="elementofaltante" wire:model="elementofaltante"/>
        </div>
        <div class="w-1/12 pl-4">
            <x-input.textred class="py-1 pl-2 text-center" type="number" id="cantidad" name="cantidad" wire:model="cantidad"/>
        </div>
        <div class="w-4/12">
            <x-input.textred class="py-1 " type="text" id="observaciones" name="observaciones" wire:model="observaciones"/>
        </div>
        <div  class="w-1/12 text-center">
            <x-icon.save-a wire:click="save">
        </x-icon.save-a></div>
    </div>
    <div class="px-2 py-1 space-y-2" >
        <div class="">
            @include('errores')
        </div>
    </div>
</div>
