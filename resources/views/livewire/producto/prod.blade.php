<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-6/12">
                <div class="flex flex-row items-center">
                    <div class="">
                        @if($producto->id)
                            <h1 class="text-2xl font-semibold text-gray-900">Producto: {{ $producto->producto }}</h1>
                        @else
                            <h1 class="text-2xl font-semibold text-gray-900">Nuevo Producto</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-6/12 text-right">
                @can('producto.create')
                    <x-button.button  onclick="location.href = '{{ route('producto.create') }}'" color="blue">Nuevo</x-button.button>
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
        <div class="flex-col w-4/12 space-y-2 text-gray-500">
            <form wire:submit.prevent="save" class="">
                <div class="pl-2 mx-2 space-y-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="prod">Producto</x-jet-label>
                        <input wire:model.defer="prod" type="text" id="prod" name="prod" value=""
                        class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        {{ $deshabilitado }}/>
                        <x-jet-input-error for="prod" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="tiendatipo_id">{{ __('Tipo Tienda') }}</x-jet-label>
                        <select  selectname="tiendatipo_id" wire:model.lazy="tiendatipo_id" id="tiendatiop_id"
                        class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">-Selecciona-</option>
                            @foreach ($tiendatipos as $tipo )
                                <option value="{{$tipo->id}}">{{$tipo->tiendatipo}}</option>
                            @endforeach
                        <select>
                        <x-jet-input-error for="productocategoria_id" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="productocategoria_id">{{ __('Categoria Producto') }}</x-jet-label>
                        <select  selectname="productocategoria_id" wire:model.lazy="productocategoria_id" id="productocategoria_id"
                        class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">-Selecciona-</option>
                            @foreach ($productocategorias as $productocategoria )
                                <option value="{{$productocategoria->id}}">{{$productocategoria->productocategoria}}</option>
                            @endforeach
                        <select>
                        <x-jet-input-error for="productocategoria_id" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="descripcion">{{ __('Descripción') }}</x-jet-label>
                        <textarea name="" wire:model.defer="descripcion" id=""  rows="2"
                        class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        <x-jet-input-error for="descripcion" class="mt-2" />
                    </div>
                    <div class="flex">
                        <div class="w-full form-item">
                            <x-jet-label class="pl-2" for="precio">{{ __('Precio') }}</x-jet-label>
                            <input  wire:model.defer="precio" type="number" step="any" id="precio" name="precio" value="old('precio')"
                                class="py-1 text-sm border-gray-300 rounded-md shadow-sm w-3-12 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                {{ $deshabilitado }}/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label class="pl-2" for="activo">{{ __('Activo') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="activo" name="activo" id="activo"
                            class="py-1 ml-2 text-sm border-gray-300 rounded-md shadow-sm w-3-12 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            {{ $deshabilitado }}/>
                        </div>
                    </div>
                </div>
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        @can('producto.edit')
                        <x-jet-button class="bg-blue-600">{{ __('Guardar') }}</x-jet-button>
                        @endcan
                        <x-jet-secondary-button  onclick="location.href = '{{route('producto.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-8/12">
            @if($producto->id)
            @livewire('producto.upload-image',['producto'=>$producto],key($producto->id))
            @else
            <div class="text-center">
                <p class="">Debe guardar el producto antes de poder añadir imágenes</p>
            </div>
            @endif
        </div>
    </div>
</div>
