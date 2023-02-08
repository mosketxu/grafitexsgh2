<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 text-white bg-orange-400 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="text-sm">
        <div class="flex w-full text-white bg-black px-6">
            <div class="w-1/12">Zona</div>
            <div class="w-1/12">Nº Stores</div>
            <div class="w-2/12 text-right">Totales</div>
            <div class="w-2/12 text-right">Promedio<br>Total</div>
            <div class="w-2/12 text-right">Promedio<br>Zona </div>
            <div class="w-2/12 text-right">Picking</div>
            <div class="w-2/12 text-right">Transp.</div>
        </div>
        <div class="w-full overflow-y-scroll bg-grey-light " style="height: 40vh;">
            @forelse($promedios as $detalle)
                <div class="flex w-full px-6">
                    <div class="w-1/12">{{$detalle->zona}}</div>
                    <div class="w-1/12">{{$detalle->stores}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->totalzona,2,',','.')}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->total / $detalle->totalstores,2,',','.')}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->totalzona / $detalle->totalstores,2,',','.')}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->picking,2,',','.')}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->transporte,2,',','.')}}</div>
                </div>
            @empty
                <div class="flex w-full">
                    <div class="w-full">No hay datos</div>
                </div>
            @endforelse
        </div>
    </div>
    @endif
</div>
