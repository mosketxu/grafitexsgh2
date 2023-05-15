<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Familias
                </h2>
            </div>
            <div class="flex flex-row-reverse w-10/12 ">
                @can('elemento.create')
                    @include('tarifa.familia.menu_familia')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl rounded-lg  space-y-1">
                @livewire('familias.familias',['familia'=>$sinidentificar,'colorindex'=>'1',key($sinidentificar->id)])
                @foreach ($tarifas as $tarifa )
                @livewire('familias.familias',['familia'=>$tarifa,'colorindex'=>$loop->index,key($tarifa->id)])
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>