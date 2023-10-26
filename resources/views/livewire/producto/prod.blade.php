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
                <x-button.button  onclick="location.href = '{{ route('producto.create') }}'" color="blue">Nuevo</x-button.button>
            </div>
        </div>

    </div>
    <div class="px-2 py-1 space-y-2" >
        <div class="">
            @include('errores')
        </div>
    </div>

    <div class="flex-none lg:flex">
        <div class="flex-col space-y-2 text-gray-500 w-4/12">
            <form wire:submit.prevent="save" class="">
                <div class="pl-2 mx-2 space-y-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="prod">Producto</x-jet-label>
                        <x-jet-input wire:model.defer="prod" type="text" class="w-full " id="prod" name="prod" :value="old('prod') "/>
                        <x-jet-input-error for="prod" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="descripcion">{{ __('Descripción') }}</x-jet-label>
                        <textarea name="" wire:model.defer="descripcion" id=""  rows="2"
                        class="w-full border-gray-300 py-1 text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <x-jet-input-error for="descripcion" class="mt-2" />
                    </div>
                    <div class="flex">
                        <div class="w-full form-item">
                            <x-jet-label class="pl-2" for="precio">{{ __('Precio') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="precio" type="number" step="any" id="precio" name="precio" :value="old('precio')" class="w-3/12"/>
                        </div>
                        <div class="w-full form-item flex">
                            <x-jet-label class="pl-2" for="activo">{{ __('Activo') }}</x-jet-label>
                            <x-jet-checkbox wire:model.defer="activo" name="activo" id="activo" class="ml-2"  />
                        </div>
                    </div>
                </div>
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        <x-jet-button class="bg-blue-600">
                            {{ __('Guardar') }}
                        </x-jet-button>
                        <x-jet-secondary-button  onclick="location.href = '{{route('producto.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-8/12">
            @livewire('producto.upload-image',['producto'=>$producto],key($producto->id))
        </div>
    </div>
</div>
