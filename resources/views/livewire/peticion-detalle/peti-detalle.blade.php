<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-6/12">
                <div class="flex flex-row items-center">
                    <div class="">
                        <h1 class="text-2xl font-semibold text-gray-900">Petición: {{ $peticion->id }} - {{$peticion->peticion}}</h1>
                   </div>
                </div>
            </div>
            <div class="w-6/12 text-right">
                @can('peticion.create')
                    <x-button.button  onclick="location.href = '{{ route('peticiondetalle.crear',$peticion) }}'" color="green">Nuevo</x-button.button>
                @endcan
            </div>
        </div>

    </div>
    <div class="px-2 py-1 space-y-2" >
        <div class="">
            @include('errores')
        </div>
    </div>

    <div class="flex-none lg:flex">
        <div class="flex w-6/12 space-y-2 text-gray-500 ">
            <form wire:submit.prevent="save" class="w-full">
                <div class="flex w-full pl-2 space-x-2 ">
                    <div class="w-2/12 ">
                        <x-jet-label class="pl-2" for="categoria_id">Categoria</x-jet-label>
                        <select  name="categoria_id" class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" id="categoria_id" wire:model.lazy="categoria_id" >
                            <option value="">--Selecciona la categoria--</option>
                            @foreach ($productocategorias as $productocategoria )
                            <option value="{{ $productocategoria->id }}">{{ $productocategoria->productocategoria }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="categoria_id" class="mt-2" />
                    </div>
                    <div class="w-3/12 ">
                        {{$productos}}
                        <x-jet-label class="pl-2" for="producto_id">Producto</x-jet-label>
                        <select  name="producto_id" class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" id="producto_id" wire:model.lazy="producto_id" >
                            <option value="">--Selecciona el producto--</option>
                            @foreach ($productos as $producto )
                            <option value="{{ $producto->id }}">{{ $producto->producto }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="producto_id" class="mt-2" />
                    </div>
                    <div class="w-1/12 ">
                        <x-jet-label class="pl-2" for="marca_id">Marca</x-jet-label>
                        <select  name="marca_id" class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" id="marca_id" wire:model.lazy="marca_id" >
                            <option value="">--Selecciona la marca--</option>
                            @foreach ($marcas as $marca )
                            <option value="{{ $marca->id }}">{{ $marca->marcaname }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="marca_id" class="mt-2" />
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pr-2 text-right " for="unidades">{{ __('Unidades') }}</x-jet-label>
                        <input  wire:model.lazy="unidades" type="number" step="any" id="unidades"
                            class="w-full py-1 text-sm text-right border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            {{ $deshabilitado }}/>
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pr-2 text-right" for="preciounidad">{{ __('Preciounidad') }}</x-jet-label>
                        <input  wire:model.lazy="preciounidad" type="number" step="any" id="preciounidad"
                        class="w-full py-1 text-sm text-right border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        {{ $deshabilitado }}/>
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pr-2 text-right" for="total">{{ __('Total') }}</x-jet-label>
                        <input  wire:model.lazy="total" type="number" step="any" id="total" name="total" value="old('total')"
                            class="w-full py-1 text-sm text-right border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            disabled/>
                    </div>
                </div>
                <div class="w-full pl-2 form-item">
                    <x-jet-label class="pl-2" for="comentario">{{ __('Comentario') }}</x-jet-label>
                    <textarea name="" wire:model.lazy="comentario" id=""  rows="2"
                    class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    <x-jet-input-error for="comentario" class="mt-2" />
                </div>
                @if(!Auth::user()->hasRole('tienda','sgh'))
                <div class="w-full pl-2 form-item">
                    <x-jet-label class="pl-2" for="observaciones">{{ __('Observaciones') }}</x-jet-label>
                    <textarea name="" wire:model.lazy="observaciones" id=""  rows="2"
                    class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    <x-jet-input-error for="observaciones" class="mt-2" />
                </div>
                @endif
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        @can('peticion.edit')
                        <x-jet-button class="bg-blue-600">{{ __('Guardar') }}</x-jet-button>
                        @endcan
                        <x-jet-secondary-button  onclick="location.href = '{{route('peticion.editar',[$peticion] )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-6/12 p-2 m-2 border border-blue-100 rounded-md shadow-md">
            <div class="w-full form-item">
                <x-jet-label class="pl-2" for="descripcion">{{ __('Descripción del producto') }}</x-jet-label>
                <textarea name="" wire:model.defer="productodescrip" id=""  rows="2"
                class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled></textarea>
                <x-jet-input-error for="descripcion" class="mt-2" />
            </div>
            <div class="grid grid-cols-1 gap-2 m-2 md:grid-cols-3 lg:grid-cols-5">
                @forelse ($imagenes as $imagen)
                    <img alt={{$imagen->imagen}} class="object-contain w-full border-2 rounded-md shadow-md cursor-pointer max-h-40 md:h-40"
                    src="{{asset('storage/producto/'.$imagen->producto_id.'/'.$imagen->imagen.'?'.time())}}"
                    onclick="location.href = '{{ asset('storage/producto/'.$imagen->producto_id.'/'.$imagen->imagen) }}'" target="_blank"/>
                @empty
                    No hay imagenes
                @endforelse
            </div>
        </div>
    </div>
</div>
