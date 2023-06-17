<div class="h-full p-1 mx-2">
    <div class="text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="flex w-full p-1 items-center space-x-2">
            <div class="w-6/12 flex">
                <x-jet-label class="mt-1 mx-2" for="campaign_name">Campaña </x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_name }}" disabled />
            </div>
            <div class="w-3/12 flex">
                <x-jet-label for="campaign_initdate">Fecha Inicio </x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_initdate }}"disabled />
            </div>
            <div class="w-3/12 flex">
                <x-jet-label for="campaign_enddate">Fecha Finalización </x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_enddate }}" disabled />
            </div>
        </div>
    </div>
    <div class="text-gray-500 shadow-md">
        <div class="flex w-full p-1 bg-gray-100 rounded-md space-x-2">
            <div class="w-6/12 flex">
                <x-jet-label class="mx-2 mt-1" for="campaign_name">Presupuesto </x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->referencia }}" disabled />
            </div>
            <div class="w-2/12 flex">
                <x-jet-label class="mx-2 mt-1"  for="version">Versión</x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->version }}" disabled />
            </div>
            <div class="w-2/12 flex">
                <x-jet-label class="mx-2 mt-1"  for="fecha">Fecha</x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->fechapre }}" disabled />
            </div>
            <div class="w-2/12 flex">
                <x-jet-label class="mx-2 mt-1"  for="total">Total</x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{number_format($campaignpresupuesto->total,2,',','.')}} €" disabled />
            </div>
        </div>
    </div>
</div>
<div class="">
    @include('errores')
</div>

<div class="flex px-1 py-1 space-x-2 rounded-md shadow-md">
    <div class="w-full py-2 space-y-1 rounded-md shadow-md">
        @livewire('campaigns.presupuesto.presupuesto-datos',['campaign'=>$campaign,'presupuesto'=>$campaignpresupuesto])
        @livewire('campaigns.presupuesto.presupuesto-extra',['campaign'=>$campaign,'presupuesto'=>$campaignpresupuesto])
        @livewire('campaigns.presupuesto.presupuesto-material',['campaign'=>$campaign,'presupuesto'=>$campaignpresupuesto])
    </div>
</div>
<div class=" m-2">
    <x-button type="button" class="py-2 text-gray-400 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.presupuesto',$campaign->id) }}'" color="gray" >{{ __('Volver') }}</x-button>
 </div>

@push('scriptchosen')

<script>
</script>


@endpush
