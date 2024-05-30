<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-6/12">
                <div class="flex flex-row items-center">
                    <div class="">
                        @if($productocategoria->id)
                            <h1 class="text-2xl font-semibold text-gray-900">Categoria de producto: {{ $productocategoria->productocategoria }}</h1>
                        @else
                            <h1 class="text-2xl font-semibold text-gray-900">Nueva categoria de producto</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-6/12 text-right">
                @can('productocategoria.create')
                    <x-button.button  onclick="location.href = '{{ route('productocategoria.create') }}'" color="blue">Nuevo</x-button.button>
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
                        <x-jet-label class="pl-2" for="categoria">Categoria</x-jet-label>
                        <input wire:model.defer="categoria" type="text" id="categoria" name="categoria" value=""
                        class="w-full py-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        {{ $deshabilitado }}/>
                        <x-jet-input-error for="categoria" class="mt-2" />
                    </div>
                </div>
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        @can('productocategoria.edit')
                        <x-jet-button class="bg-blue-600">{{ __('Guardar') }}</x-jet-button>
                        @endcan
                        <x-jet-secondary-button  onclick="location.href = '{{route('productocategoria.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
