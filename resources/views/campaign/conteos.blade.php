<div class="">
    <div class="h-full p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                    </div>
                </div>
            </div>
            <div class="flex px-1 py-1 space-x-2 rounded-md shadow-md">
                <div class="w-full py-2 space-y-1 rounded-md shadow-md">
                    @livewire('campaigns.conteos.detallado',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.tiendaszonas',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.materiales',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.segmentos',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.storeconcepts',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.mobiliarios',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.propxelementos',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.cartelerias',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.medidas',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.materialmedidas',['campaign'=>$campaign,key($campaign_id->id)])
                    @livewire('campaigns.conteos.idiomamaterialmedidas',['campaign'=>$campaign,key($campaign_id->id)])
                    {{-- @livewire('campaigns.conteos.tarifas',['campaign'=>$campaign]) --}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')

@endpush
