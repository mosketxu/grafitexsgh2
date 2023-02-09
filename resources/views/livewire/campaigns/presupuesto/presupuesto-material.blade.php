<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 text-white bg-blue-400 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }} {{number_format($totalMateriales,2,',','.')}}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="text-sm">
        <div class="flex w-full text-white bg-black px-6">
            <div class="w-4/12">Material</div>
            <div class="w-2/12">Uds x prop</div>
            <div class="w-2/12 text-right">€ ud.</div>
            <div class="w-2/12 text-right">Total</div>
            <div class="w-2/12 text-right"></div>
        </div>
        <div class="w-full overflow-y-scroll bg-grey-light items-center" style="height: 40vh;">
            @forelse($materiales as $detalle)
                <div class="flex w-full px-6  items-center">
                    <div class="w-4/12">{{$detalle->tarifa->familia}}</div>
                    <div class="w-2/12">{{$detalle->unidades}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->precio,2,',','.')}}</div>
                    <div class="w-2/12 text-right">{{number_format($detalle->tot,2,',','.')}}</div>
                    <div class="w-2/12 text-right">
                        <x-icon.cubes-a class="w-6 mt-1 text-green-600" href="{{route('campaign.presupuesto.elementosfamilia', ['campaignid'=>$campaign->id,'familiaid'=>$detalle->tarifa,'presupuestoid'=>$presupuesto->id] ) }}" title="Elementos"/>
                    </div>
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
