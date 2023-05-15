<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 {{ $textocolor }} bg-{{ $color }}-400 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{$familia->familia}}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="w-full border rounded-md shadow-md">
        <div class="flex w-full py-1 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
            <div class="w-1/12">#</div>
            <div class="w-4/12">Material</div>
            <div class="w-3/12">Medida</div>
            <div class="w-3/12">Familia</div>
            <div class="w-1/12"></div>
        </div>
        @foreach ($tarifas as $tarifa)
            @livewire('familias.familia',['tarifa'=>$tarifa,key($tarifa->id)])
        @endforeach
    </div>
    @endif
</div>
