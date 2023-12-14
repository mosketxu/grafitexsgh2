<form wire:submit.prevent="save" class="">
    <div class="flex p-2 space-x-2">
        <div class="w-1/12 form-item">
            <x-jet-label class="pl-2" for="id">Nº</x-jet-label>
            <input type="text" id="id" name="id" value="{{ $peticion->id }} "
            class="w-full py-1 text-xs bg-blue-100 border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            disabled/>
            <x-jet-input-error for="id" class="mt-2" />
        </div>
        <div class="w-3/12 form-item">
            <x-jet-label class="pl-2" for="peticionario_id">Solicitada por</x-jet-label>
            <input type="text"
            value="{{ $solicitadopor }}"
            class="w-full py-1 text-xs text-gray-600 bg-blue-100 border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none"
            disabled/>
            <x-jet-input-error for="peticionario_id" class="mt-2" />
        </div>
        <div class="w-4/12 form-item">
            <x-jet-label class="pl-2" for="peti">Petición</x-jet-label>
            <input wire:model.defer="peti" type="text" id="peti" name="peti" value=""
            class="w-full py-1 text-xs border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            {{ $deshabilitado }}/>
            <x-jet-input-error for="peti" class="mt-2" />
        </div>
        <div class="w-2/12 form-item">
            <x-jet-label class="pl-2" for="fecha">Fecha</x-jet-label>
            <input wire:model.defer="fecha" type="date" id="fecha" name="fecha"
            class="w-full py-1 text-xs border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            {{ $deshabilitado }}/>
            <x-jet-input-error for="fecha" class="mt-2" />
        </div>
        <div class="w-2/12 form-item">
            <x-jet-label class="pl-2" for="fecha">Total</x-jet-label>
            <input wire:model.defer="total" type="number" id="total" name="total"
            class="w-full py-1 text-xs border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            disabled/>
            <x-jet-input-error for="total" class="mt-2" />
        </div>
    </div>
    <div class="flex w-full px-1">
        <div class="w-full form-item">
            <x-jet-label class="pl-2" for="observaciones">{{ __('Observaciones') }}</x-jet-label>
            <textarea name="" wire:model.defer="observaciones" id=""  rows="2"
            class="w-full py-1 text-xs border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ $deshabilitado }}></textarea>
            <x-jet-input-error for="observaciones" class="mt-2" />
        </div>
        <div class="flex">
        </div>
    </div>
    <div class="flex pl-2 mb-1 ml-1 space-x-4">
        <div class="space-x-3">
            @if($estado<2)
            @can('peticion.edit')
            <x-jet-button class="bg-blue-600">{{ __('Guardar') }}</x-jet-button>
            @endcan
            @endif
            <x-jet-secondary-button  onclick="location.href = '{{route('peticion.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
        </div>
    </div>
</form>
