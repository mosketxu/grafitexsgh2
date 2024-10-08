<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 text-white bg-green-900 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }} </div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="">
        {{-- <div class="pl-2">
            {{ $materialmedidas->appends(request()->except('page'))->links() }}
        </div> --}}
        <div class="flex flex-row-reverse space-x-4">
            {{-- <div class="mx-4">
                {{ $materialmedidas->appends(request()->except('page'))->links() }}
            </div> --}}
            <x-icon.xls-a id="xls" href="{{route('campaign.elementosmatmed.export',$campaign->id)}}" class="w-6 mr-4 text-green-700" title="Exporta Excel"/>
        </div>
        <div class="">
            <div class="flex w-full text-white bg-black">
                <div class="w-3/12 pl-2">Material</div>
                <div class="w-3/12">Medida</div>
                <div class="w-3/12">Totales</div>
                <div class="w-3/12">Unidades</div>
            </div>
            <div class="w-full overflow-y-scroll bg-grey-light" style="height: 60vh;">
            @foreach($materialmedidas as $detalle)
                <div class="flex w-full">
                    <div class="w-3/12 pl-2">{{$detalle->material}}</div>
                    <div class="w-3/12">{{$detalle->medida}}</div>
                    <div class="w-3/12">{{$detalle->totales}}</div>
                    <div class="w-3/12">{{$detalle->unidades}}</div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

