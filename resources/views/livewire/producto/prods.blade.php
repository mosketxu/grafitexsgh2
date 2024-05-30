<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                @include('producto.productofilters')
            </div>
            {{-- tabla productos --}}
            <div class="flex-col space-y-4">
                <div>
                    <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                        <div class="w-3/12 px-2 font-light md:w-3/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Producto') }}" /></div>
                        <div class="w-1/12 px-1 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Tienda Tipo') }}" /></div>
                        <div class="w-1/12 px-1 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Cat.Prod.') }}" /></div>
                        <div class="w-2/12 px-2 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Descripción') }}" /></div>
                        <div class="w-1/12 px-2 font-light md:flex md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-right text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Precio') }}" /></div>
                        <div class="w-1/12 px-2 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-center text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Activo') }}" /></div>
                        <div class="w-2/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Imagen') }} " /></div>
                        <div class="w-1/12 md:w-1/12" ></div>
                    </div>
                    <div>
                        @forelse ($productos as $producto)
                            <div class="flex items-center w-full pl-2 text-sm border-t-0 border-y hover:bg-gray-100" wire:loading.class.delay="opacity-50">
                                <div class="w-3/12 px-2 md:w-3/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 bg-transparent border-0 rounded-md " value="{{ $producto->producto }}" readonly/>
                                </div>
                                <div class="w-1/12 px-2 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 bg-transparent border-0 rounded-md " value="{{ $producto->tiendatipo->tiendatipo }}" readonly/>
                                </div>
                                <div class="w-1/12 px-2 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 bg-transparent border-0 rounded-md " value="{{ $producto->productocategoria->productocategoria }}" readonly/>
                                </div>
                                <div class="w-2/12 px-2 md:w-2/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 bg-transparent border-0 rounded-md " value="{{ $producto->descripcion }}" readonly/>
                                </div>
                                <div class="w-1/12 px-2 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-right text-gray-500 bg-transparent border-0 rounded-md " value="{{ $producto->precio }}"  readonly/>
                                </div>
                                <div class="w-1/12 px-2 text-center md:w-1/12">
                                    <input type="checkbox" {{ $producto->activo=="1" ? 'checked' : '' }} name="ok" value="ok"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    readonly disabled/>
                                </div>
                                <div class="w-2/12 px-2 m-2">
                                    @if($producto->imagenes->count()>0)
                                        <img alt={{$producto->imagenes->first()->imagen}}
                                        class="object-contain w-full p-2 border-2 rounded-md shadow-md cursor-pointer max-h-20 md:h-20"
                                        src="{{asset('storage/producto/'.$producto->id.'/thumbnails/thumb-'.$producto->imagenes->first()->imagen.'?'.time())}}"
                                        onclick="location.href = '{{ asset('storage/producto/'.$producto->id.'/'.$producto->imagenes->first()->imagen) }}'" target="_blank"/>
                                    @endif
                                </div>
                                <div class="flex w-1/12 ml-3 space-x-3 text-right md:w-1/12">
                                    @can('producto.edit')
                                        <x-icon.edit-a href="{{ route('producto.editar',$producto) }}" class="w-6"  title="Editar"/>
                                    @endif
                                    @can('producto.delete')
                                        <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $producto->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
                                    @endcan
                                </div>
                            </div>
                        @empty
                            <div>
                                <div colspan="10">
                                    <div class="flex items-center justify-center">
                                        <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                        <span class="py-5 text-xl font-medium text-gray-500">
                                            No se han encontrado datos...
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
