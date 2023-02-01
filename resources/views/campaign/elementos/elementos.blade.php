<div class="">
    <div class="h-full p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full rounded-md bg-gray-100 p-1">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 form-control form-control-sm bg-gray-100 rounded-md" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1  form-control form-control-sm bg-gray-100 rounded-md" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 form-control form-control-sm bg-gray-100 rounded-md" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full">
            <div class="m-2">
                <a href="{{route('campaign.elementos.export',$campaign->id)}}" title="Exporta Excel"><x-icon.xls/></a></td>
                Hay {{$elementos->count()}} elementos disponibles.
            </div>
            <table class="text-left w-full text-xs">
                <thead class="bg-black text-white flex flex-col  w-full">
                    <tr class="flex w-full">
                        <th class="w-1/12">#</th>
                        <th class="w-1/12">Store</th>
                        <th class="w-1/12">Name</th>
                        <th class="w-1/12">Country</th>
                        <th class="w-1/12">Area</th>
                        <th class="w-1/12">Idioma</th>
                        <th class="w-1/12">Segmento</th>
                        <th class="w-1/12">Store Concept</th>
                        <th class="w-1/12">Ubicación</th>
                        <th class="w-1/12">Mobiliario</th>
                        <th class="w-1/12">Prop x Elemento</th>
                        <th class="w-1/12">Carteleria</th>
                        <th class="w-1/12">Medida</th>
                        <th class="w-1/12">Material</th>
                        <th class="w-1/12">Unit x Prop</th>
                        {{-- <th class="w-1/12">Observaciones</th> --}}
                        <th width="150px">Imagen </th>
                        <th width="50px" class="text-center"><span class="ml-1">Acción</th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col  overflow-y-scroll w-full" style="height: 70vh;">
                    @foreach ($elementos as $campelemento)
                        @livewire('campaigns.campaign-elementos',['campelemento'=>$campelemento,'campaign'=>$campaign],key($campelemento->id))
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush
