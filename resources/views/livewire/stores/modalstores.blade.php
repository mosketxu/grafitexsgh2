<div>
    <div class="flex space-x-3">
        @can('store.create')
        <button wire:click="cambiamodalstores()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Nueva store
        </button>
        @endcan
        @can('store.index')
            <x-button.button  class="py-1" onclick="location.href = '{{ route('store.addresses') }}'" color="green" >{{ __('Direcciones') }}</x-button.button>
        @endcan
    </div>
    {{-- Modal fichero stores --}}
    <x-modal.datos wire:model="muestramodalstores" >
        <x-slot name="title">
            {{ __('Nueva tienda') }}
        </x-slot>
        <x-slot name="content">
            <form id="formulariostores" role="form" method="post" action="{{ route('store.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="text-sm">
                <div class="flex">
                    <div class="w-3/12 form-item">
                        <x-jet-label for="id">Store</x-jet-label>
                        <x-input.text class="w-full py-1" id="idstore" name="id" value="{{old('id')}}"/>
                    </div>
                    <div class="w-9/12">
                        <x-jet-label for="name">Nombre</x-jet-label>
                        <x-input.text  class="w-full py-1" id="name" name="name" value="{{old('name')}}"/>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-3/12">
                        <x-jet-label for="country">Country</x-jet-label>
                        <x-select selectname="country" class="w-full py-1.5 border-blue-300" id="country" name="country" >
                            <option value="">Selecciona</option>
                            <option value="ES">ES</option>
                            <option value="PT">PT</option>
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="area">Area</x-jet-label>
                        <x-select  selectname="area_id" class="w-full py-1.5 border-blue-300" id="area_id" name="area_id" >
                            <option value="">Selecciona</option>
                            @foreach($areas as $area )
                            <option value="{{$area->id}}" {{old('area_id')==$area->id ? 'selected' : ''}}>{{$area->area}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="segmento">Segmento</x-jet-label>
                        <x-select  selectname="segmento" class="w-full py-1.5 border-blue-300" id="segmento" name="segmento" >
                            <option value="">Selecciona</option>
                            @foreach($segmentos as $segmento )
                            <option value="{{$segmento->segmento}}" {{old('segmento')==$segmento->segmento ? 'selected' : ''}}>{{$segmento->segmento}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="concepto">Concepto</x-jet-label>
                        <x-select selectname="concepto_id" class="w-full py-1.5 border-blue-300" id="concepto_id" name="concepto_id" >
                            <option value="">Selecciona</option>
                            @foreach($conceptos as $concepto )
                            <option value="{{$concepto->id}}" {{old('concepto_id')==$concepto->id ? 'selected' : ''}}>{{$concepto->storeconcept}}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
                <div class="w-full">
                    <x-jet-label for="imagen">Imagen</x-jet-label>
                    <input   type="file" class="w-full p-0 py-1.5 m-0" id="imagen" name="imagen" value="{{old('imagen')}}"/>
                </div>
                <div class="w-full">
                    <x-jet-label for="observaciones">Observaciones</x-jet-label>
                    <x-input.text  class="w-full " id="observaciones" name="observaciones" value="{{old('observaciones')}}"/>
                </div>
                </div>
                <div class="mt-5 ">
                <x-jet-secondary-button wire:click="cambiamodalstores()">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
                @can('store.create')
                <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                    {{ __('Guardar') }}
                </x-jet-button>
                @endcan
            </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="text-left">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
