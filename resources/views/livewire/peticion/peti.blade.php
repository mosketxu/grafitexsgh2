<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-6/12">
                <div class="flex flex-row items-center">
                    <div class="">
                        @if($peticion->id)
                            <h1 class="text-2xl font-semibold text-gray-900">Petición: {{ $peticion->id }}</h1>
                        @else
                            <h1 class="text-2xl font-semibold text-gray-900">Nueva Petición</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-6/12 text-right">
                @can('peticion.create')
                    <x-button.button  onclick="location.href = '{{ route('peticion.create') }}'" color="blue">Nuevo</x-button.button>
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
        <div class="flex-col w-full space-y-2 text-gray-500">
            <form wire:submit.prevent="save" class="">
                <div class="flex pl-2 space-x-2">
                    <div class="w-1/12 form-item">
                        <x-jet-label class="pl-2" for="id">Nº</x-jet-label>
                        <input type="text" id="id" name="id" value="{{ $peticion->id }} "
                        class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        disabled/>
                        <x-jet-input-error for="id" class="mt-2" />
                    </div>
                    <div class="w-4/12 form-item">
                        <x-jet-label class="pl-2" for="peti">Petición</x-jet-label>
                        <input wire:model.defer="peti" type="text" id="peti" name="peti" value="old('peti') "
                        class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        {{ $deshabilitado }}/>
                        <x-jet-input-error for="peti" class="mt-2" />
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pl-2" for="peticionario_id">Solicitada por</x-jet-label>
                        <input type="text"
                        value={{ Auth::user()->name }}
                        class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none"
                        disabled/>
                        <x-jet-input-error for="peticionario_id" class="mt-2" />
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pl-2" for="fecha">Fecha</x-jet-label>
                        <input wire:model.defer="fecha" type="date" id="fecha" name="fecha" value="old('fecha') "
                        class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        {{ $deshabilitado }}/>
                        <x-jet-input-error for="fecha" class="mt-2" />
                    </div>
                    <div class="w-1/12 form-item">
                        <x-jet-label class="pl-2" for="fecha">Total</x-jet-label>
                        <input wire:model.defer="total" type="number" id="total" name="total" value="old('total') "
                        class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        disabled/>
                        <x-jet-input-error for="total" class="mt-2" />
                    </div>
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pl-2" for="total">{{ __('Estado') }}</x-jet-label>
                        @if(!Auth::user()->hasRole('tienda'))
                            <select wire:model="estado"
                                class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none">
                                @foreach ($estados as $estado )
                                    <option value={{ $estado->id }}>{{ $estado->peticionestado }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text"
                            value={{ $estado }}
                            class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none"
                            disabled>
                        @endif
                    </div>
                </div>
                <div class="flex w-full pl-2 ">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="observaciones">{{ __('Observaciones') }}</x-jet-label>
                        <textarea name="" wire:model.defer="observaciones" id=""  rows="2"
                        class="w-full py-1 text-sm border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        <x-jet-input-error for="observaciones" class="mt-2" />
                    </div>
                    <div class="flex">
                    </div>
                </div>
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        @can('peticion.edit')
                        <x-jet-button class="bg-blue-600">{{ __('Guardar') }}</x-jet-button>
                        @endcan
                        <x-jet-secondary-button  onclick="location.href = '{{route('peticion.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
