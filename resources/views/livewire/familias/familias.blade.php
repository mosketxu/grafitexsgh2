<div class="w-full border rounded-md shadow-md">
    <span class="bg-amber-400"></span>
    <span class="bg-blue-400"></span>
    <span class="bg-cyan-400"></span>
    <span class="bg-emerald-400"></span>
    <span class="bg-fuchsia-400"></span>
    <span class="bg-blueGray-400"></span>
    <span class="bg-coolGray-400"></span>
    <span class="bg-warmGray-400"></span>
    <span class="bg-green-400"></span>
    <span class="bg-indigo-400"></span>
    <span class="bg-lime-400"></span>
    <span class="bg-orange-400"></span>
    <span class="bg-pink-400"></span>
    <span class="bg-purple-400"></span>
    <span class="bg-red-400"></span>
    <span class="bg-rose-400"></span>
    <span class="bg-sky-400"></span>
    <span class="bg-teal-400"></span>
    <span class="bg-violet-400"></span>
    <span class="bg-yellow-400"></span>

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
