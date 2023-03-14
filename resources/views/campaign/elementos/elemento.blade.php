<div class="h-full p-1 mx-2">
    <div class="text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="flex w-full p-1  rounded-md space-x-2">
            <div class="w-6/12 rounded-md">
                <x-jet-label for="campaign_name">Campaña</x-jet-label>
                <input type="text" class="w-full py-1 rounded-md" id="campaign_name"
                    name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    disabled />
            </div>
            <div class="w-3/12">
                <x-jet-label for="campaign_initdate">Fecha Inicio</x-jet-label>
                <input type="date" class="w-full py-1 rounded-md" id="campaign_initdate"
                    name="campaign_initdate"
                    value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                    disabled />
            </div>
            <div class="w-3/12">
                <x-jet-label for="campaign_enddate">Fecha Finalización</x-jet-label>
                <input type="date" class="w-full py-1 rounded-md" id="campaign_enddate"
                    name="campaign_enddate"
                    value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                    disabled />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    @livewire('campaigns.campaign-elementos',['campelemento'=>$campaignelemento,'campaign'=>$campaign,'ruta'=>'campaign.elemento'],key($campaignelemento->id))
</div>

@push('scriptchosen')

<script>

</script>


@endpush
