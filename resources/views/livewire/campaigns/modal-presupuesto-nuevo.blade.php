<div>
    <div class="flex space-x-3">
        <button wire:click="cambiamodal()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Nuevo
        </button>
    </div>
    <x-modal.datos wire:model="muestramodal" >
        <x-slot name="title">
            <span class="text-2xl font-semibold">{{ __('Nuevo Presupuesto') }}</span>
        </x-slot>
        <x-slot name="content">
            <form method="post" action="{{ route('campaign.presupuesto.store') }}">
                @csrf
                <input type="hidden" id="campaign_id" name="campaign_id" value="{{ $campaign->id }}" />
                <input type="hidden" id="estado" name="estado" value="0" />
                <div class="flex space-x-1 ">
                    <div class="w-full">
                        <x-jet-label class="text-base" for="referencia">Referencia</x-jet-label>
                        <x-input.text type="text" class="w-full " name="referencia" value="{{old('referencia')}}"/>
                    </div>
                </div>
                <div class="flex space-x-1 ">
                    <div class="w-6/12">
                        <x-jet-label class="text-base" for="version">Versión</x-jet-label>
                        <x-input.text  type="number" step="0.1" class="w-full " name="version" value="{{ old('version','1.0')}}"/>
                    </div>
                    <div class="w-6/12">
                        <x-jet-label class="text-base" for="fecha">Fecha</x-jet-label>
                        <x-input.text  type="date" class="w-full " name="fecha" id="fecha" value="{{old('fecha',date('Y-m-d'))}}"/>
                    </div>
                </div>
                <div class="flex space-x-1 ">
                    <div class="w-full">
                        <x-jet-label class="text-base" for="atencion">A la atención</x-jet-label>
                        <x-input.text  type="text" class="w-full " name="atencion" value="{{old('atencion')}}"/>
                    </div>
                </div>
                <div class="flex space-x-1 ">
                    <div class="w-full">
                        <x-jet-label class="text-base" for="observaciones">Observaciones</x-jet-label>
                        <textarea name="observaciones" class="w-full text-sm border-gray-300 rounded-md" rows="3">{{ old('observaciones') }} </textarea>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodal()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    @can('stores.create')
                    <x-jet-button type="submit" class="bg-blue-600 hover:bg-blue-900" >
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

