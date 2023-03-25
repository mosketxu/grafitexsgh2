<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                @include('entidad.entidadfilters')
            </div>
            {{-- tabla entidades --}}
            <div class="flex-col space-y-4">
                <div>
                    <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                        <div class="w-3/12 font-light" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Nombre') }}" /></div>
                        <div class="w-1/12 font-light" ><input type="text" class="w-full text-center py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Montador') }}" /></div>
                        <div class="w-3/12 font-light" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Ciudad') }}" /></div>
                        <div class="w-2/12 font-light" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Provincia') }}" /></div>
                        <div class="w-2/12 font-light" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Area') }} " /></div>
                        <div class="w-1/12 " ></div>
                    </div>
                    <div>
                        @forelse ($entidades as $entidad)
                            <div class="flex items-center w-full pl-2 text-sm border-t-0 border-y" wire:loading.class.delay="opacity-50">
                                <div class="w-3/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $entidad->entidad }}" readonly/>
                                </div>
                                <div class="w-1/12 text-center">
                                    @if($entidad->montador=='1')
                                        <x-icon.circle-check-a class="text-green-600  hover:text-green-600 hover:hover:scale-100"/>
                                    @endif
                                </div>
                                <div class="w-3/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $entidad->localidad }}"  readonly/>
                                </div>
                                <div class="w-2/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $entidad->provinci->provincia ?? '-'}}"  readonly/>
                                </div>
                                <div class="w-2/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $entidad->entidadarea->area ?? '-' }}" readonly/>
                                </div>
                                <div class="w-1/12 justify-between flex">
                                    <x-icon.edit-a href="{{ route('entidad.edit',$entidad) }}" class="w-6"  title="Editar"/>
                                    <x-icon.usergroup-a href="{{ route('entidad.contactos',$entidad) }}" class="w-6"  title="Contactos"/>
                                    <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $entidad->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
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
                {{-- <div>
                    {{ $entidades->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
