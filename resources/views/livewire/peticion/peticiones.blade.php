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
                        <div class="w-1/12 font-light md:w-1/12" >{{ __('Nº') }}</div>
                        <div class="w-2/12 font-light md:w-2/12" >{{ __('Petición') }}</div>
                        <div class="w-1/12 font-light md:w-1/12" >{{ __('Solicitada por') }}</div>
                        <div class="w-1/12 font-light md:w-1/12" >{{ __('Fecha') }}</div>
                        <div class="w-1/12 font-light md:w-1/12" >{{ __('Total') }}</div>
                        <div class="w-4/12 font-light md:w-4/12" >{{ __('Observaciones') }}  </div>
                        <div class="w-2/12 font-light md:w-2/12" >{{ __('Estado') }}  </div>
                    </div>
                    <div class="flex w-1/12 pl-2 text-sm text-black bg-blue-100 rounded-tr-md">
                        {{-- <div class="">#</div> --}}
                    </div>
                </div>
                <div>
                @forelse ($peticiones as $peticion)
                <div class="flex items-center even:bg-white odd:bg-blue-50" wire:loading.class.delay="opacity-50">
                    <div onclick="location.href = '{{ route('peticion.editar',$peticion) }}'"
                        class="flex items-center w-11/12 py-1 pl-2 space-x-2 text-sm text-black cursor-pointer hover:bg-gray-100">
                        <div class="w-1/12 cursor-pointer md:w-1/12">{{ $peticion->id }}</div>
                        <div class="w-2/12 cursor-pointer md:w-2/12">{{ $peticion->peticion }}</div>
                        <div class="w-1/12 cursor-pointer md:w-1/12">{{ $peticion->peticionario->name ?? '-' }}</div>
                        <div class="w-1/12 cursor-pointer md:w-1/12">{{ $peticion->fechapre }}</div>
                        <div class="w-1/12 cursor-pointer md:w-1/12">{{ $peticion->total }}</div>
                        <div class="w-4/12 cursor-pointer md:w-4/12">{{ $peticion->observaciones }}</div>
                        <div class="w-2/12 cursor-pointer md:w-2/12">{{ $peticion->estado->estadopeticion ?? '-' }}</div>
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
