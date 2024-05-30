<div>
    <div class="">
        <div class="flex w-full space-x-2">
            <div class="pl-2 text-xl font-bold ">Elementos no recibidos</div>
        </div>
        <div class="space-x-2 border rounded-md">
            <div class="flex items-center w-full pt-2 text-sm font-bold text-gray-500 bg-red-100 rounded-t-md">
                <div class="w-6/12 pl-2">Elemento no recibido</div>
                <div class="w-1/12 text-center">Cantidad</div>
                <div class="w-4/12 ">Observaciones</div>
                <div class="w-1/12"></div>
            </div>
            @foreach ($elementofaltantes as $elementofaltante)
                <div class="flex items-center w-full py-1 space-x-2 text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
                    <div class="w-6/12 pl-2">{{$elementofaltante->elementofaltante}}</div>
                    <div class="w-1/12 text-center">{{$elementofaltante->cantidad}}</div>
                    <div class="w-4/12">{{$elementofaltante->observaciones}}</div>
                    <div class="w-1/12 text-center">
                        <x-icon.delete-a wire:click.prevent="delete({{ $elementofaltante }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="w-6 mr-2"/>
                    </div>
                </div>
            @endforeach
            @livewire('elementos.elemento-faltante',['campaigntiendaid'=>$campaigntienda->id,'campaignelementofaltanteid'=>null,'campaignid'=>$campaignid,'storeid'=>$storeid,],key($campaigntienda->id))
        </div>
    </div>
</div>
