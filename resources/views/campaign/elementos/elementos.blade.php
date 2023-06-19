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
            <div class="flex w-full pt-2 pb-0 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-tl-md">
                <div class="w-2/12 pl-2">Store <br> Name</div>
                <div class="w-1/12 pl-2">Country/Area/Idioma</div>
                <div class="w-1/12 pl-2">Segmento <br> St.Concept</div>
                <div class="w-1/12 pl-2">Ubicación</div>
                <div class="w-2/12 pl-2">Mobiliario</div>
                <div class="w-1/12 pl-2">Prop.Elem.</div>
                <div class="w-1/12 pl-2">Carteleria</div>
                <div class="w-1/12 pl-2">Medida <br> Material</div>
                <div class="w-1/12 pl-2">Unit.Prop.</div>
                <div width="w-1/12 pl-2">Imagen </div>
            </div>
            @foreach ($elementos as $campelemento)
                @livewire('campaigns.campaign-elementos',['campelemento'=>$campelemento,'campaign'=>$campaign,'ruta'=>'campaign.elementos'],key($campelemento->id))
            @endforeach
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush
