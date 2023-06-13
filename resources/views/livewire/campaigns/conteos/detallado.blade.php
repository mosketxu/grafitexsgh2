<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 text-white bg-blue-500 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="">
        {{-- <div class="pl-2">
            {{ $conteodetallado->appends(request()->except('page'))->links() }}
        </div> --}}
        <div class="">
            <div class="flex w-full text-white bg-black">
                <div class="w-1/12 pl-2">Area</div>
                <div class="w-2/12">Segmento</div>
                <div class="w-1/12">Ubicación</div>
                <div class="w-2/12">Medida</div>
                <div class="w-2/12">Mobiliario</div>
                <div class="w-2/12">Material</div>
                <div class="w-1/12">Totales</div>
                <div class="w-1/12">Unidades</div>
            </div>
            <div class="w-full overflow-y-scroll bg-grey-light" style="height: 60vh;">
            @foreach($conteodetallado as $detalle)
                <div class="flex w-full">
                    <div class="w-1/12 pl-2">{{$detalle->area}}</div>
                    <div class="w-2/12">{{$detalle->segmento}}</div>
                    <div class="w-1/12">{{$detalle->ubicacion}}</div>
                    <div class="w-2/12">{{$detalle->medida}}</div>
                    <div class="w-2/12">{{$detalle->mobiliario}}</div>
                    <div class="w-2/12">{{$detalle->material}}</div>
                    <div class="w-1/12">{{$detalle->totales}}</div>
                    <div class="w-1/12">{{$detalle->unidades}}</div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
