<div class="h-full p-1 mx-2">
    <div class="text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="flex w-full p-1 bg-gray-100 rounded-md">
            <div class="w-6/12 rounded-md">
                <x-jet-label for="campaign_name">Campaña</x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" id="campaign_name"
                    name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    disabled />
            </div>
            <div class="w-3/12">
                <x-jet-label for="campaign_initdate">Fecha Inicio</x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" id="campaign_initdate"
                    name="campaign_initdate"
                    value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                    disabled />
            </div>
            <div class="w-3/12">
                <x-jet-label for="campaign_enddate">Fecha Finalización</x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" id="campaign_enddate"
                    name="campaign_enddate"
                    value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                    disabled />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    @include('errores')
</div>
<form id="formpresupuesto" role="form" method="post" action="{{ route('campaign.presupuesto.update',$campaignpresupuesto->id) }}">
    @csrf
    <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
        <div class="w-full h-1/3 flex my-2">
            <div class="w-6/12 space-y-2 my-2 ml-4 pr-2 items-center" >
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
            <div class="w-6/12 mr-4 pl-2">
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
