<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('stores.storeescaparates.escaparatesfilters')
        </div>
    </div>
    <div class="pb-0 mx-2 space-y-1 border rounded-md">
        {{-- Datos de la tienda --}}
        <div class="">
            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-green-100 rounded-t-md">
                Datos de la tienda
            </div>
            <div class="flex w-full pb-0 pl-2 space-x-1 text-sm tracking-tighter text-gray-500 rounded-t-md">
                <div class="w-full"><label class="font-bold text-black">Store</label><div>{{ $store->id }}</div></div>
                <div class="w-full"><label class="font-bold text-black">Store Name</label><div>{{ $store->name }}</div></div>
                <div class="w-full"><label class="font-bold text-black">Country</label><div>{{ $store->country }}</div></div>
                <div class="w-full"><label class="font-bold text-black">Area</label><div>{{ $store->are->area }}</div></div>
                <div class="w-full"><label class="font-bold text-black">Segmento</label><div>{{ $store->segmento }}</div></div>
                <div class="w-full"><label class="font-bold text-black">Concept</label><div>{{ $store->concep->storeconcept }}</div></div>
                <div class="w-full">
                    <img src="{{asset('storage/store/'.$store->imagen)}}" alt="{{$store->imagen}}" title="{{$store->imagen}}" class="img-fluid img-thumbnail" style="height: 50px; max-width: 200px;"/>
                </div>
            </div>
        </div>
        {{-- Datos escaparates de la tienda --}}
        <div class="m-2 border rounded-md">
            <div class="pl-2 text-lg font-bold">Escaparates de la tienda</div>
            <div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 ">
                <div class="w-2/12">Escaparate</div>
                <div class="w-2/12">Ancho</div>
                <div class="w-2/12">Alto</div>
                <div class="w-2/12">Area</div>
                <div class="w-3/12">Observaciones</div>
                <div class="w-1/10"></div>
            </div>
            @forelse ($storeescaparates as $escaparate)
                <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    <div class="w-2/12">{{$escaparate->escaparate->escaparate}}</div>
                    <div class="w-2/12">{{$escaparate->escaparate->ancho ?? ''}}</div>
                    <div class="w-2/12">{{$escaparate->escaparate->alto ?? ''}}</div>
                    <div class="w-2/12">{{$escaparate->escaparate->area ?? ''}}</div>
                    <div class="w-3/12">{{$escaparate->escaparate->observaciones ?? ''}}</div>
                    <div  class="flex w-1/12 text-center">
                        @can('storeescaparate.update')
                        <form method="post" action="{{ route('storeescaparates.addtostore',[$escaparate->escaparate_id,$store]) }}">
                        @csrf
                            <button type="submit"><x-icon.copy-a class="text-blue-500" title="Copiar escaparate"/></button>
                        </form>
                        @endcan
                        @can('storeescaparate.delete')
                            @livewire('stores.store-escaparates.store-escaparate-eliminar',['escaparate'=>$escaparate],key($escaparate->id))
                        @endcan
                    </div>
                </div>
            @empty
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    No hay escaparates
            </div>
            @endforelse
        </div>

        {{-- Datos escaparates de la tienda --}}

        <div class="m-2 border rounded-md">
            <div class="pl-2 text-lg font-bold">Escaparates disponibles</div>
            <div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-yellow-100 ">
                <div class="w-2/12">Escaparate</div>
                <div class="w-2/12">Ancho</div>
                <div class="w-2/12">Alto</div>
                <div class="w-2/12">Area</div>
                <div class="w-3/12">Observaciones</div>
                <div class="w-1/10"></div>
            </div>
            @forelse ($escaparatesdisponibles as $escaparate)
                <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    <div class="w-2/12">{{$escaparate->escaparate}}</div>
                    <div class="w-2/12">{{$escaparate->ancho}}</div>
                    <div class="w-2/12">{{$escaparate->alto}}</div>
                    <div class="w-2/12">{{$escaparate->area}}</div>
                    <div class="w-3/12">{{$escaparate->observaciones}}</div>
                    <div  class="w-1/12 text-right">
                        @can('storeescaparate.update')
                        <form method="post" action="{{ route('storeescaparates.addtostore',[$escaparate,$store]) }}">
                        @csrf
                            <button type="submit"><x-icon.circle-plus-a class="text-blue-500"/></button>
                        </form>
                        @endcan
                    </div>
                </div>
            @empty
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    No hay escaparates
            </div>
            @endforelse
        </div>
    </div>
    <div class="">
        <x-button.primary class="m-2" onclick="location.href = '{{route('stores.index') }}'">Volver</x-button.primary>
    </div>
</div>

    @push('scriptchosen')

    <script>
    new TomSelect('#escap', {maxItems: 10,});
    </script>

    @endpush
