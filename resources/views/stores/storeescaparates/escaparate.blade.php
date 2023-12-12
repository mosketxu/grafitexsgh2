<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-0 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('stores.storeescaparates.escaparatesfilters')
        </div>
        {{-- Datos de la tienda --}}
        <div class="mx-2">
            <div class="flex w-full pt-2 pb-0 pl-2 text-sm font-bold tracking-tighter text-gray-500 bg-green-100 space-x -1 rounded-t-md">
                Datos de la tienda
            </div>
            <div class="flex w-full pb-0 pl-2 text-sm tracking-tighter text-gray-500 space-x -1 rounded-t-md">
                <div class="w-full">
                    <label class="font-bold text-black">Store</label>
                    <div>{{ $store->id }}</div>
                </div>
                <div class="w-full">
                    <label class="font-bold text-black">Store Name</label>
                    <div>{{ $store->name }}</div>
                </div>
                <div class="w-full">
                    <label class="font-bold text-black">Country</label>
                    <div>{{ $store->country }}</div>
                </div>
                <div class="w-full">
                    <label class="font-bold text-black">Area</label>
                    <div>{{ $store->are->area }}</div>
                </div>
                <div class="w-full">
                    <label class="font-bold text-black">Segmento</label>
                    <div>{{ $store->segmento }}</div>
                </div>
                <div class="w-full">
                    <label class="font-bold text-black">Concept</label>
                    <div>{{ $store->concep->storeconcept }}</div>
                </div>
                <div class="w-full">
                    <img src="{{asset('storage/store/'.$store->imagen)}}" alt="{{$store->imagen}}" title="{{$store->imagen}}" class="img-fluid img-thumbnail" style="height: 50px; max-width: 200px;"/>
                </div>
            </div>
        </div>
        <div class="mx-2">
            <div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 ">
                <div class="w-2/12">Escaparate</div>
                <div class="w-2/12">Ancho</div>
                <div class="w-2/12">Alto</div>
                <div class="w-2/12">Area</div>
                <div class="w-3/12">Observaciones</div>
                <div class="w-1/12"></div>
            </div>
            @foreach ($escaparatesDisp as $escaparate)
            <form action="{{route('storeescaparates.store',$escaparate->id)}}" method="post">
                @csrf
                <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    <input type="hidden" name="escaparate_id" value="{{$escaparate->id}}">
                    <input type="hidden" name="store_id" value="{{$store->id}}">
                    <div class="w-2/12">{{$escaparate->escaparate}}</div>
                    <div class="w-2/12">{{$escaparate->ancho}}</div>
                    <div class="w-2/12">{{$escaparate->alto}}</div>
                    <div class="w-2/12">{{$escaparate->area}}</div>
                    <div class="w-3/12">{{$escaparate->observaciones}}</div>
                    <div  class="flex w-1/12">
                        <div class="">
                            <x-button class="border-none" type="submit"><x-icon.circle-plus class="text-blue-600"></x-icon></x-button.primary>
                        </div>
                        @can('storeescaparate.delete')
                            @livewire('stores.store-escaparates.store-escaparate-eliminar',['escaparate'=>$escaparate],key($escaparate->id))
                        @endcan

                    </div>
                </div>
            </form>
            @endforeach
            <div class="py-0 ml-2">
                {{ $escaparatesDisp->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</div>



@push('scriptchosen')


<script>
    new TomSelect('#ubi', {maxItems: 10,});
    new TomSelect('#mobi', {maxItems: 10,});
    new TomSelect('#prop', {maxItems: 10,});
    new TomSelect('#car', {maxItems: 10,});
    new TomSelect('#med', {maxItems: 10,});
    new TomSelect('#mat', {maxItems: 10,});
</script>

@endpush


