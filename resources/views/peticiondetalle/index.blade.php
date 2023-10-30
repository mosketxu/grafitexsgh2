<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="flex-col space-y-4">
                <div>
                    <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                        <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Producto') }}" /></div>
                        <div class="w-3/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-center text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Comentario') }}" /></div>
                        <div class="w-1/12 font-light md:flex md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Unidades') }}" /></div>
                        <div class="w-1/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('€/ud.') }}" /></div>
                        <div class="w-1/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Total') }} " /></div>
                        <div class="w-3/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Imagen') }} " /></div>
                        <div class="w-1/12 md:w-1/12" ></div>
                    </div>
                    <div>
                        @forelse ($detalles as $detalle)
                            <div class="flex items-center w-full pl-2 text-sm border-t-0 border-y" wire:loading.class.delay="opacity-50">
                                <div class="w-2/12 md:w-2/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->id }}" />
                                </div>
                                <div class="w-3/12 md:w-3/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $detalle->comentario_id }}" />
                                </div>
                                <div class="w-1/12 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->unidades }}" readonly/>
                                </div>
                                <div class="w-1/12 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->preciounidad }}" readonly/>
                                </div>
                                <div class="w-1/12 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->total }}"  readonly/>
                                </div>
                                <div class="w-3/12 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-right text-gray-500 border-0 rounded-md" value="{{ $peticion->observaciones }}"  readonly/>
                                </div>
                                <div class="flex w-1/12 ml-3 space-x-3 text-right md:w-1/12">
                                    <x-icon.edit-a href="{{ route('peticiondetalle.editar',$detalle) }}" class="w-6"  title="Editar"/>
                                    <form action="{{route('peticiondetalle.delete', $detalle->id )}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button onclick="return confirm('{{ __('¿Estás seguro?') }}')"><x-icon.delete class="text-red-500 w-9"/></button>
                                        <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $peticion->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
                                    </form>
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
