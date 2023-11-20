<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="flex-col space-y-1">
                <div class="flex items-center w-full">
                        <h2 class="text-lg font-semibold leading-tight text-gray-800">Listado Peticiones</h2>
                        @if($peticion->estadopeticion_id=='1' && $peticion->id)
                            <x-button.buttongreen  onclick="location.href = '{{ route('peticiondetalle.crear',$peticion) }}'" class="py-1 ml-4">Añadir elemento</x-button.buttongreen>
                        @endif
                </div>
                <div class="flex w-full py-2 pl-2 space-x-2 text-sm text-gray-500 bg-green-100 rounded-t-md">
                    <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('Producto') }}" /></div>
                    <div class="w-4/12 font-light md:w-4/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('Comentario') }}" /></div>
                    <div class="w-1/12 font-light md:flex md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('Unidades') }}" /></div>
                    <div class="w-1/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('€/ud.') }}" /></div>
                    <div class="w-1/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('Total') }} " /></div>
                    <div class="w-2/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-green-100 border-0 rounded-md" value= "{{ __('Imagen') }} " /></div>
                    <div class="w-1/12 md:w-1/12" ></div>
                </div>
                <div>
                    @forelse ($detalles as $detalle)
                        <div class="flex items-center w-full pl-2 space-x-2 text-sm border-t-0 border-y" wire:loading.class.delay="opacity-50">
                            <div class="w-2/12 md:w-2/12 ">
                                <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->producto->producto }}" readonly/>
                            </div>
                            <div class="w-4/12 md:w-4/12">
                                <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->comentario }}" readonly/>
                            </div>
                            <div class="w-1/12 md:flex md:w-1/12">
                                <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->unidades }}" readonly/>
                            </div>
                            <div class="w-1/12 md:w-1/12">
                                <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->preciounidad }}" readonly/>
                            </div>
                            <div class="w-1/12 md:flex md:w-1/12">
                                <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->total }}"  readonly/>
                            </div>
                            <div class="w-2/12 ">
                                @if($detalle->producto->imagenes->count()>0)
                                    <img alt={{$detalle->producto->imagenes->first()->imagen}}
                                    class="object-contain w-full p-2 border-2 rounded-md shadow-md cursor-pointer max-h-32 md:h-32"
                                    src="{{asset('storage/producto/'.$detalle->producto->id.'/thumbnails/thumb-'.$detalle->producto->imagenes->first()->imagen.'?'.time())}}"
                                    onclick="location.href = '{{ asset('storage/producto/'.$detalle->producto->id.'/'.$detalle->producto->imagenes->first()->imagen) }}'" target="_blank"/>
                                @endif
                            </div>
                            <div class="flex w-1/12 ml-3 space-x-3 text-right md:w-1/12">
                                @if($peticion->estadopeticion_id<'2')
                                    <x-icon.edit-a href="{{ route('peticiondetalle.edit',[$peticion,$detalle]) }}" class="w-6"  title="Editar"/>
                                    <form action="{{route('peticiondetalle.destroy', $detalle->id )}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button onclick="return confirm('{{ __('¿Estás seguro?') }}')"><x-icon.delete class="text-red-500 w-9"/></button>
                                    </form>
                                @endif
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
