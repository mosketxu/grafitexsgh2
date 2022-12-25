<div class="">
    {{-- botones --}}
    <div class="w-full p-2 space-y-2">
        <div class="flex space-x-3 mx-2">
            <button wire:click="cambiatabla('country')"
                class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Country
            </button>
            <button wire:click="cambiatabla('area')"
                class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Area
            </button>
            <button wire:click="cambiatabla('segmento')"
                class="w-full text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Segmento
            </button>
            <button wire:click="cambiatabla('furniture')"
                class="w-full text-white bg-zinc-700 hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Furniture Type
            </button>
            <button wire:click="cambiatabla('concept')"
                class="w-full text-white bg-fuchsia-700 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-fuchsia-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Store Concept
            </button>
            <button wire:click="cambiatabla('ubicacion')"
                class="w-full text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Ubicación
            </button>
        </div>
        <div class="flex space-x-3 mx-2 ">
            <button wire:click="cambiatabla('mobiliario')"
                class="w-full text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Mobiliario
            </button>
            <button wire:click="cambiatabla('propxelem')"
                class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Prop x Elem.
            </button>
            <button wire:click="cambiatabla('carteleria')"
                class="w-full text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Carteleria
            </button>
            <button wire:click="cambiatabla('medida')"
                class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Medida
            </button>
            <button wire:click="cambiatabla('material')"
                class="w-full text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm text-center " type="button" data-modal-toggle="defaultModal">
                Material
            </button>
        </div>
    </div>
    {{-- taablas --}}
    <div class="">
        <div class="h-full p-1 mx-2">
            <div class="py-1 space-y-2">
                <div class="">
                    @include('errores')
                </div>
            </div>
            </div>
        </div>
        <div class="p-2 w-6/12 mx-auto space-y-1 ">
            {{-- Datos elementos --}}
            <div class="w-full m-2 border border-gray-500 shadow-md rounded-md">
                {{-- titulos --}}
                <div class="flex w-full mx-auto pt-2 pb-1 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-t-md ">
                    <div class="w-1/12 text-center">#</div>
                    <div class="w-10/12 flex space-x-2">
                        <div class="">
                            {{ $titulo }}
                        </div>
                        <div class="flex">
                            <input type="text" wire:model="search" class="w-full py-0.5 text-sm border border-blue-100 rounded-lg" autofocus/>
                            @if($search!='')
                                <x-icon.filter-slash-a wire:click="$set('search', '')" class="pb-1" title="reset filter"/>
                            @endif
                        </div>
                    </div>
                    <div class="W-1/12 text-center">
                        @if($vista!='country')
                            @if($nuevo!='1')
                            <x-icon.circle-plus-a class="w-6 text-green-500 hover:text-green-700 " wire:click="muestranuevo()" title="Nuevo"/>
                            @else
                            <x-icon.circle-minus-a class="w-6 text-pink-500 hover:text-pink-700 " wire:click="muestranuevo()" title="Nuevo"/>
                            @endif
                        @endif
                    </div>
                </div>
                @if($nuevo=='1')
                <div class="">
                    <div class="flex w-full mx-auto  bg-green-50 p-1 space-x-1 text-sm tracking-tighter text-gray-800  ">
                        <div  class="w-1/12">
                            <x-input.text class="py-0.5 bg-green-50" disabled/>
                        </div>
                        <div  class="w-10/12">
                            <x-input.text class="py-0.5"  wire:model="valorcampo"/>
                        </div>
                        <div  class="w-1/12 text-center"><x-icon.save-a wire:click="save()"></x-icon.save-a></div>
                    </div>
                </div>
                @endif
                @forelse ($valores as $val )
                <div class="flex w-full mx-auto  p-1 space-x-1 text-sm tracking-tighter text-gray-800  ">
                    <div  class="w-1/12">
                        <x-input.text class="py-0.5 bg-blue-50" value="{{ $val->ide }} " disabled/>
                    </div>
                    <div  class="w-10/12">
                        <x-input.text class="py-0.5" value="{{ $val->valor }}"
                            wire:change="changeValor({{ $val }},$event.target.value)"/>
                    </div>
                    <div  class="w-1/12 text-center"><x-icon.edit-a></x-icon.edit-a></div>
                </div>
                @empty
                    No hay datos
                @endforelse
            </div>
        </div>
    </div>

    @push('scriptchosen')


    <script>

    </script>

    @endpush
</div>
