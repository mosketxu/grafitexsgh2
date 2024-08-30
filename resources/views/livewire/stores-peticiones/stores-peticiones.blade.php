<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            {{-- @include('stores.storesfilters') --}}
        </div>
        <div class="flex-col space-y-4">
            <div>
                <div class="flex w-full py-1 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md ">
                    <div class="flex w-11/12 ">
                        <div class="hidden pl-2 text-left md:flex md:w-1/12">Luxottica</div>
                        <div class="w-1/12 text-left md:w-1/12">Code</div>
                        <div class="w-6/12 text-left md:w-1/12">Store</div>
                        <div class="hidden pl-2 text-left md:flex md:w-1/12">T.Tienda</div>
                        <div class="w-2/12 text-left md:w-1/12">Country/ <br> Area</div>
                        <div class="hidden md:text-left md:w-1/12 md:flex">Segmento</div>
                        <div class="hidden md:text-left md:w-1/12 md:flex">Channel</div>
                        <div class="hidden md:text-left md:w-1/12 md:flex">Cluster</div>
                        <div class="hidden md:text-left md:w-2/12 md:flex">Concepto</div>
                        <div class="hidden md:text-left md:w-1/12 md:flex">Furniture Type</div>
                    </div>
                    <div class="w-1/12 text-left">
                    </div>
                </div>
                <div class="">
                    @foreach ($stores as $store)
                    <form id="form{{$store->id}}" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                    @csrf
                        <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100" wire:loading.class.delay="opacity-50">
                            @can('stores.edit')
                            <div class="flex items-center w-11/12 "  onclick="location.href = '{{ route('stores.edit',$store) }}'">
                            @else
                            <div class="flex items-center w-11/12 " >
                            @endcan
                                <input type="hidden" name="id" value="{{$store->id}}">
                                <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$store->luxotica}}</div>
                                <div class="w-1/12 text-left ">{{$store->id}}</div>
                                @can('montador.index')
                                <div class="w-5/12 text-left md:w-1/12">{{$store->name}}</div>
                                @else
                                <div class="w-6/12 text-left md:w-1/12">{{$store->name}}</div>
                                @endcan
                                <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$store->tiendatipo->tiendatipo ?? '-'}}</div>
                                <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$store->montajetipo->montajetipo ?? '-'}}</div>
                                <div class="w-2/12 text-left md:w-1/12">{{$store->country}} / {{$store->are->area}}</div>
                                <div class="hidden md:text-left md:w-1/12 md:flex">{{$store->segmento}}</div>
                                <div class="hidden md:text-left md:w-1/12 md:flex">{{$store->channel}}</div>
                                <div class="hidden md:text-left md:w-1/12 md:flex">{{$store->store_cluster}}</div>
                                <div class="hidden md:text-left md:w-2/12 md:flex">{{$store->concep->storeconcept ?? '-'}}</div>
                                <div class="hidden md:text-left md:w-1/12 md:flex">{{$store->furniture_type}}</div>
                                @can('montador.index')
                                <div class="w-1/12 text-left ">
                                    @if($store->montador_id)
                                    <a href="{{ route('entidad.show',$store->montador_id) }}" class="text-blue-600 underline">{{$store->montador->entidad}}</a>
                                    @endif
                                </div>
                                @endcan
                            </div>
                            <div class="flex flex-row-reverse items-center w-1/12 pr-2 space-x-4 text-center">
                                @livewire('stores.store-eliminar',['store'=>$store],key($store->id))
                                @can('storeelementos.index')
                                <div class="pr-2"><x-icon.cubes-a href="{{ route('storespeticiones.productos',$store) }}" title="Elementos" class="w-6 text-green-600 "/></div>
                                @endcan
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                <div class="col-10 row">
                    {{ $stores->links() }}
            </div>
        </div>
    </div>
</div>


