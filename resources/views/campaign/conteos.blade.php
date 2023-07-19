<div class="">
    <div class="h-full p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            @include('campaign.campaigncabecera')
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
