<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="flex">
            <div class="w-3/12">
                <x-input.text type="searchcode" class="py-1 mx-1 my-1 text-xs" placeholder="Busqueda por code de tienda" wire:model="searchcode"/>
            </div>
            <div class="w-4/12">
                <x-input.text type="search" class="py-1 mx-1 my-1 text-xs" placeholder="Busqueda por nombre de tienda" wire:model="search"/>
            </div>
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
                    @foreach ($stores as $sto )
                    <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100"
                        wire:loading.class.delay="opacity-50">
                        <div class="flex items-center w-11/12 "  onclick="location.href = '{{ route('storespeticiones.productos',$sto) }}'" title="Asociar productos">
                            <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$sto->luxotica}}</div>
                            <div class="w-1/12 text-left ">{{$sto->id}}</div>
                            <div class="w-6/12 text-left md:w-1/12">{{$sto->name}}</div>
                            <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$sto->tiendatipo->tiendatipo ?? '-'}}</div>
                            <div class="hidden pl-2 overflow-hidden text-left md:flex md:w-1/12">{{$sto->montajetipo->montajetipo ?? '-'}}</div>
                            <div class="w-2/12 text-left md:w-1/12">{{$sto->country}} / {{$sto->are->area}}</div>
                            <div class="hidden md:text-left md:w-1/12 md:flex">{{$sto->segmento}}</div>
                            <div class="hidden md:text-left md:w-1/12 md:flex">{{$sto->channel}}</div>
                            <div class="hidden md:text-left md:w-1/12 md:flex">{{$sto->store_cluster}}</div>
                            <div class="hidden md:text-left md:w-2/12 md:flex">{{$sto->concep->storeconcept ?? '-'}}</div>
                            <div class="hidden md:text-left md:w-1/12 md:flex">{{$sto->furniture_type}}</div>
                        </div>
                        <div class="flex flex-row-reverse items-center w-1/12 pr-2 space-x-4 text-center">
                            @livewire('stores.store-eliminar',['store'=>$sto],key($sto->id))
                            <div class="pr-2"><x-icon.edit-a href="{{ route('stores.edit',$sto) }}" title="Editar store" class="w-6 text-green-600 "/></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-10 row">
                    {{ $stores->links() }}
            </div>
        </div>
    </div>
</div>


