<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                @include('peticion.peticionfilters')
            </div>
            {{-- tabla peticions --}}
            <div class="flex-col space-y-4">
                <div>
                    <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                        <div class="w-1/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Nº') }}" /></div>
                        <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Petición') }}" /></div>
                        <div class="w-1/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-center text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Solicitada por') }}" /></div>
                        <div class="w-1/12 font-light md:flex md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Fecha') }}" /></div>
                        <div class="w-1/12 font-light md:w-1/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Total') }}" /></div>
                        <div class="w-4/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Observaciones') }} " /></div>
                        <div class="w-1/12 font-light " ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Estado') }} " /></div>
                        <div class="w-1/12 md:w-1/12" ></div>
                    </div>
                    <div>
                        @forelse ($peticiones as $peticion)
                            <div class="flex items-center w-full pl-2 text-sm border-t-0 border-y" wire:loading.class.delay="opacity-50">
                                <div class="w-1/12 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->id }}" readonly/>
                                </div>
                                <div class="w-2/12 md:w-2/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->peticion }}" readonly/>
                                </div>
                                <div class="w-1/12 md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->peticionario->name ?? '-' }}" readonly/>
                                </div>
                                <div class="w-1/12 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->fecha }}"  readonly/>
                                </div>
                                <div class="w-1/12 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-right text-gray-500 border-0 rounded-md" value="{{ $peticion->total }}"  readonly/>
                                </div>
                                <div class="w-4/12 md:flex md:w-4/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->observaciones }}"  readonly/>
                                </div>
                                <div class="w-1/12 md:flex md:w-1/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $peticion->estado->peticionestado ?? '-' }}"  readonly/>
                                </div>
                                <div class="flex w-1/12 ml-3 space-x-3 text-right md:w-1/12">
                                    <x-icon.edit-a href="{{ route('peticion.editar',$peticion) }}" class="w-6"  title="Editar"/>
                                    @can('peticion.delete')
                                        <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $peticion->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
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
