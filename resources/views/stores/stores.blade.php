<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('stores.storesfilters')
        </div>
        <div class="mx-2 space-y-1 border rounded-md">
            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-blue-100 rounded-t-md">
                {{-- <div class="w-1/12 text-left">Luxottica</div> --}}
                <div class="w-1/12 text-left">Country</div>
                <div class="w-1/12 text-left">Code</div>
                <div class="w-1/12 text-left">Store</div>
                <div class="w-1/12 text-left">Country</div>
                <div class="w-1/12 text-left">Area</div>
                <div class="w-1/12 text-left">Segmento</div>
                <div class="w-1/12 text-left">Channel</div>
                <div class="w-1/12 text-left">Cluster</div>
                <div class="w-1/12 text-left">Concepto</div>
                <div class="w-1/12 text-left">Furniture Type</div>
                <div class="w-1/12 text-left">
                    @can('entidad.index')
                        Montador
                    @endcan
                </div>
                {{-- @hasanyrole('admin|grafitex')
                    <div class="w-1/12 text-left">Prov.Fav</div>
                @endhasanyrole --}}
                <div class="w-1/12 text-left"></div>
            </div>
            <div class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 60vh;">
                @foreach ($stores as $store)
                <form id="form{{$store->id}}" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf
                    <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y ">
                        <input type="hidden" name="id" value="{{$store->id}}">
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->luxotica}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->id}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->name}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->country}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->are->area}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->segmento}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->channel}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->store_cluster}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->concep->storeconcept}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">{{$store->furniture_type}}</div>
                        <div class="flex-wrap w-1/12 my-2 text-left">
                            @can('entidad.index')
                                @if($store->proveedor_id)
                                    <a href="{{ route('entidad.show',$store->proveedor_id) }}" class="text-blue-600 underline">{{$store->proveedor->entidad}}</a>
                                @endif
                            @endcan
                        </div>

                        {{-- @hasanyrole('admin|grafitex')
                            <div class="w-1/12 text-left">
                                @if($store->proveedor_id)
                                <a href="{{ route('entidad.edit',$store->proveedor->id) }}">{{ $store->proveedor->entidad }}</a>
                                @endif
                            </div>
                        @endhasanyrole --}}

                        <div class="flex items-center w-1/12 space-x-1 text-center">
                            @can('stores.edit')
                                <x-icon.edit-a href="{{ route('stores.edit',$store) }}" class="w-5 text-blue-600" title="Editar tienda"/>
                            @endcan
                            @can('storeelementos.index')
                                <x-icon.cubes-a href="{{ route('storeelementos.elementos',$store) }}" title="Elementos" class="w-6 text-green-600"/>
                            @endcan
                            {{-- @can('store.delete') --}}
                                @livewire('stores.store-eliminar',['store'=>$store],key($store->id))
                            {{-- @endcan --}}
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
                <div class="col-10 row">
                {{ $stores->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')

<script>
    new TomSelect('#lux', {maxItems: 10,});
    new TomSelect('#sto', {maxItems: 10,});
    new TomSelect('#nam', {maxItems: 10,});
    new TomSelect('#coun', {maxItems: 10,});
    new TomSelect('#are', {maxItems: 10,});
    new TomSelect('#segmen', {maxItems: 10,});
    new TomSelect('#cha', {maxItems: 10,});
    new TomSelect('#clu', {maxItems: 10,});
    new TomSelect('#conce', {maxItems: 10,});
    new TomSelect('#fur', {maxItems: 10,});
</script>


@endpush
