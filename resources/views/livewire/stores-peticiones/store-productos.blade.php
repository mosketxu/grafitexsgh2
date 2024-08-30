<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
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
        {{-- Datos productos de la tienda --}}
        <div class="m-2 border rounded-md">
            <div class="pl-2 text-lg font-bold">Productos asociados a la tienda</div>
            <div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 ">
                <div class="w-4/12">Producto</div>
                <div class="w-1/12">Tipo Tienda</div>
                <div class="w-1/12">Categoria</div>
                <div class="w-4/12">Descripción</div>
                <div class="w-1/12">Activo</div>
                <div class="w-1/12"></div>
            </div>
            <div class="">
                @include('storespeticiones.productosasociadosfilters')
            </div>
            @forelse ($storeproductos as $storeproducto)
                <div class="flex w-full  pl-2 my-1 items-center space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1  hover:bg-blue-50">
                    <div class="w-4/12">{{$storeproducto->producto->producto}}</div>
                    <div class="w-1/12">{{$storeproducto->producto->tiendatipo->tiendatipo}}</div>
                    <div class="w-1/12">{{$storeproducto->producto->productocategoria->productocategoria}}</div>
                    <div class="w-4/12">{{$storeproducto->producto->descripcion}}</div>
                    <div class="w-1/12">
                        @if($storeproducto->producto->activo=='1')
                            <x-icon.circle-check title="Activo" class="mr-1 pb-1 text-green-500 w-5 "/>
                        @else
                            <x-icon.cross title="Inactivo" class="mr-1 my-0 py-0 text-red-500 w-4 "/>
                        @endif
                    </div>
                    <div  class="flex text-center w-1/12">
                        <x-icon.delete-a wire:click.prevent="deletefromstore({{ $storeproducto->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="w-6 mr-2"/>
                    </div>
                </div>
            @empty
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    No hay productos
            </div>
            @endforelse
        </div>

        {{-- Datos productos de la tienda --}}

        <div class="m-2 border rounded-md">
            <div class="pl-2 text-lg font-bold">Productos disponibles</div>
            <div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-yellow-100 ">
                <div class="w-4/12">Producto</div>
                <div class="w-1/12">Tipo Tienda</div>
                <div class="w-1/12">Categoria</div>
                <div class="w-4/12">Descripción</div>
                <div class="w-1/12">Activo</div>
                <div class="w-1/12"></div>
            </div>
            <div class="">
                @include('storespeticiones.productosdisponiblesfilters')
            </div>
            @forelse ($productosdisponibles as $productodisponible)
                <div class="flex w-full pl-2 items-center my-1 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1 hover:cursor-pointer hover:bg-yellow-50"
                wire:click="addtostore({{ $productodisponible }})">
                    <div class="w-4/12">{{$productodisponible->producto}}</div>
                    <div class="w-1/12">{{$productodisponible->tiendatipo->tiendatipo}}</div>
                    <div class="w-1/12">{{$productodisponible->productocategoria->productocategoria}}</div>
                    <div class="w-4/12">{{$productodisponible->descripcion}}</div>
                    <div class="w-1/12 items-center mt-0 pt-0">
                        @if($productodisponible->activo=='1')
                            <x-icon.circle-check title="Activo" class="mr-1 pb-1 text-green-500 w-5 "/>
                        @else
                            <x-icon.cross title="Inactivo" class="mr-1 my-0 py-0 text-red-500 w-4 "/>
                        @endif
                    </div>
                    <div  class="flex text-center w-1/12">
                        <x-icon.circle-plus class="text-blue-500"/>
                    </div>
                </div>
            @empty
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    No hay productos
            </div>
            @endforelse
        </div>
    </div>
    <div class="">
        <x-button.primary class="m-2" onclick="location.href = '{{route('stores.index') }}'">Volver</x-button.primary>
    </div>
</div>

