<div class="h-full p-1 mx-2">
    @include('campaign.campaigncabecera')
</div>
<div class="">
    @include('errores')
</div>
<form id="formpresupuesto" role="form" method="post" action="{{ route('campaign.presupuesto.update',$campaignpresupuesto->id) }}">
    @csrf
    <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
        <div class="flex w-full my-2 h-1/3">
            <div class="items-center w-6/12 pr-2 my-2 ml-4 space-y-2" >
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="referencia">Referencia</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" class="py-1" id="referencia" name="referencia" value="{{old('referencia',$campaignpresupuesto->referencia)}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="version">Versión</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="number" step="0.1" class="py-1" id="version" name="version" value="{{old('version',$campaignpresupuesto->version)}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="fecha">Fecha</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="date" class="py-1" id="fecha" name="fecha" value="{{old('fecha',$campaignpresupuesto->fechaprestr)}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="atencion">Atención</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" class="py-1" id="atencion" name="atencion" value="{{old('atencion',$campaignpresupuesto->atencion)}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="estado">Estado</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.select type="text" id="estado" name="estado">
                            <option value="0" {{ $campaignpresupuesto->estado=='0' ? 'selected' : ''}}>Creado</option>
                            <option value="1"{{ $campaignpresupuesto->estado=='1' ? 'selected' : ''}}>Iniciado</option>
                            <option value="2"{{ $campaignpresupuesto->estado=='2' ? 'selected' : ''}}>Aceptado</option>
                            <option value="3"{{ $campaignpresupuesto->estado=='3' ? 'selected' : ''}}>Rechazado</option>
                        </x-input.select>
                    </div>
                </div>
            </div>
            <div class="w-6/12 pl-2 mr-4">
                    <lx-jet-label class="font-blod" for="observaciones">Observaciones</lx-jet-label>
                    <textarea name="observaciones" class="w-full text-sm border-blue-300 rounded-md" rows="3">{{ old('observaciones',$campaignpresupuesto->observaciones) }}</textarea>
            </div>
        </div>
    </div>
    <div class="p-2">
        <div class="pb-2 mx-2 my-2">
            @can('presupuestos.edit')
                <x-button.primary type="submit">ACTUALIZAR</x-button.primary>
            @endcan
                <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.presupuesto',$campaign->id) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div>
    </div>
</form>

@push('scriptchosen')

<script>
</script>


@endpush
