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
            <div class="">
                <div class="flex">
                    <div class="flex w-11/12 pl-2 space-x-2 text-sm text-black bg-blue-100 rounded-tl-md">
                        <div class="w-1/12 font-light md:w-1/12" ><x-input.text class="w-full text-sm text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Nº') }}" disabled/></div>
                        <div class="w-2/12 font-light md:w-2/12" ><x-input.text class="w-full text-sm text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Petición') }}"  disabled /></div>
                        <div class="w-1/12 font-light md:w-1/12" ><x-input.text class="w-full text-sm text-center text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Solicitada por') }}"  disabled /></div>
                        <div class="w-1/12 font-light md:w-1/12" ><x-input.text class="w-full text-sm text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Fecha') }}"  disabled/></div>
                        <div class="w-1/12 font-light md:w-1/12" ><x-input.text class="w-full text-sm text-right text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Total') }}"  disabled/></div>
                        <div class="w-4/12 font-light md:w-4/12" ><x-input.text class="w-full text-sm text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Observaciones') }} "  disabled /></div>
                        <div class="w-2/12 font-light md:w-2/12" ><x-input.text class="w-full text-sm text-gray-500 bg-blue-100 border-blue-100 rounded-md" value="{{ __('Estado') }} "  disabled/></div>
                    </div>
                    <div class="flex w-1/12 pl-2 text-sm text-black bg-blue-100 rounded-tr-md">
                        {{-- <div class="">#</div> --}}
                    </div>
                </div>
                <div>
                @forelse ($peticiones as $peticion)
                <div class="flex items-center " wire:loading.class.delay="opacity-50">
                    <div onclick="location.href = '{{ route('peticion.editar',$peticion) }}'"
                        class="flex items-center w-11/12 pl-2 space-x-2 text-sm text-black cursor-pointer">
                        <div class="w-1/12 cursor-pointer md:w-1/12"><x-input.text class="w-full text-sm font-thin text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->id }}" readonly/></div>
                        <div class="w-2/12 cursor-pointer md:w-2/12"><x-input.text class="w-full text-sm font-thin text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->peticion }}" readonly/></div>
                        <div class="w-1/12 cursor-pointer md:w-1/12"><x-input.text class="w-full text-sm font-thin text-center text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->peticionario->name ?? '-' }}" readonly/></div>
                        <div class="w-1/12 cursor-pointer md:w-1/12"><x-input.text class="w-full text-sm font-thin text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->fechapre }}"  readonly/></div>
                        <div class="w-1/12 cursor-pointer md:w-1/12"><x-input.text class="w-full text-sm font-thin text-right text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->total }}"  readonly/></div>
                        <div class="w-4/12 cursor-pointer md:w-4/12"><x-input.text class="w-full text-sm font-thin text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->observaciones }}"  readonly/></div>
                        <div class="w-2/12 cursor-pointer md:w-2/12"><x-input.text class="w-full text-sm font-thin text-gray-500 border-0 rounded-md cursor-pointer" value="{{ $peticion->estado->estadopeticion ?? '-' }}"  readonly/></div>
                    </div>
                    <div class="flex w-1/12 pl-2 text-sm text-center text-black ">
                        {{-- <x-icon.edit-a href="{{ route('peticion.editar',$peticion) }}" class="w-6"  title="Editar"/> --}}
                        @can('peticion.delete')
                        <div class="items-center mx-auto text-center">
                            <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $peticion->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
                            </div>
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
