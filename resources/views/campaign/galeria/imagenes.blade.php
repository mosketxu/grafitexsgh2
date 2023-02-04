<div class="">
    <div class="p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-2/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-2/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
                <div class="w-2/12 text-center">
                    <div class="text-center">
                        <label for="xls">Hay {{$totalGaleria}} imágenes.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full h-3/5">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full">
                        <th class="w-1/12 pl-2">#</th>
                        <th class="w-1/12">Mobiliario</th>
                        <th class="w-1/12">Carteleria</th>
                        <th class="w-1/12">Medidas</th>
                        {{-- <th class="w-1/12">Elemento</th> --}}
                        <th class="w-3/12">Observaciones</th>
                        <th class="w-1/12">Eci</th>
                        <th class="w-2/12">Imagen</th>
                        <th class="w-1/12">Img</th>
                        <th class="w-1/12" class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 70vh;">
                    @foreach ($campaigngaleria as $imagen)
                    <tr class="flex w-full">
                        <td class="w-1/12 pl-2">{{$imagen->id}}</td>
                        <td class="w-1/12">{{$imagen->mobiliario}}</td>
                        <td class="w-1/12">{{$imagen->carteleria}}</td>
                        <td class="w-1/12">{{$imagen->medida}}</td>
                        {{-- <td class="w-1/12">{{$imagen->elemento}}</td> --}}
                        <td class="w-3/12">{{$imagen->observaciones}}</td>
                        <td class="w-1/12">{{$imagen->eci}}</td>
                        <td class="w-2/12" id="imagen{{$imagen->id}}">{{$imagen->imagen}}</td>
                        <td class="w-1/12">
                            @livewire('campaigns.campaign-galeria',['campelemento'=>$imagen,'campaign'=>$campaign,'ruta'=>'campaign.galeria'],key($imagen->id))
                        </td>
                        <td class="w-1/12 text-center">
                            @can('campaign.edit')
                            <x-icon.edit-a href="{{ route('campaign.galeria.editgaleria',[$campaign->id,$imagen->id]) }}" title="Edit" class=""/>
                            @endcan
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scriptchosen')

<script>

</script>

@endpush
