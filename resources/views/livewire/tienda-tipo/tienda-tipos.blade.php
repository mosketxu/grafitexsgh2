<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-4">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                @include('tiendatipo.tiendatipofilters')
            </div>
            {{-- tabla tiendatipos --}}
            <div class="flex-col space-y-4">
                <div>
                    <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                        <div class="w-3/12 px-2 font-light md:w-6/12" ><input type="text" class="w-full py-0 text-sm text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Tienda Tipo') }}" /></div>
                        <div class="w-1/12 md:w-1/12" ></div>
                    </div>
                    <div>
                        @forelse ($tiendatipos as $tiendatipo)
                            <div class="flex items-center w-full pl-2 text-sm border-t-0 border-y" wire:loading.class.delay="opacity-50">
                                <div class="w-6/12 px-2 md:w-6/12">
                                    <input type="text" class="w-full text-sm font-thin text-gray-500 border-0 rounded-md" value="{{ $tiendatipo->tiendatipo }}" />
                                </div>
                                <div class="flex w-1/12 ml-3 space-x-3 text-right md:w-1/12">
                                    @can('tiendatipo.edit')
                                        <x-icon.edit-a href="{{ route('tiendatipo.editar',$tiendatipo) }}" class="w-6"  title="Editar"/>
                                    @endif
                                    @can('tiendatipo.delete')
                                        <x-icon.trash-a class="w-5 text-red-500" wire:click.prevent="delete({{ $tiendatipo->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
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
