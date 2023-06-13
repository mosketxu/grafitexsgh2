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
                    <div class="w-6 mx-auto mt-2 text-center">
                        <x-icon.xls-a id="xls" href="{{route('campaign.elementos.export',$campaign->id)}}" class="w-6 mt-5 text-green-700" title="Exporta Excel"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full px-2">
            <div class="m-2">
                {{ $elementos->appends(request()->except('page'))->links() }}
            </div>
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full">
                        {{-- <th class="w-1/12">#</th> --}}
                        <th class="w-16">Store</th>
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
                        <th class="w-1/12 text-left">Unit x Prop</th>
                        {{-- <th class="w-1/12">Observaciones</th> --}}
                        <th width="150px">Imagen </th>
                        <th width="w-1/12" class="mr-3">Acción</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($elementos as $campelemento)
                        @livewire('campaigns.campaign-elementos',['campelemento'=>$campelemento,'campaign'=>$campaign,'ruta'=>'campaign.elementos'],key($campelemento->id))
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
