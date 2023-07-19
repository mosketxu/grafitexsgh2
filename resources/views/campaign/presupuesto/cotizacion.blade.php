<div class="h-full p-1 mx-2">
    @include('campaign.campaigncabecera')
    <div class="flex w-full p-1 mt-1 space-x-2 border border-blue-600 rounded-md bg-blue-50">
        <div class="flex w-6/12">
            <x-jet-label class="mx-2 mt-1" for="campaign_name">Presupuesto </x-jet-label>
            <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->referencia }}" disabled />
        </div>
        <div class="flex w-2/12">
            <x-jet-label class="mx-2 mt-1"  for="version">Versión</x-jet-label>
            <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->version }}" disabled />
        </div>
        <div class="flex w-2/12">
            <x-jet-label class="mx-2 mt-1"  for="fecha">Fecha</x-jet-label>
            <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaignpresupuesto->fechapre }}" disabled />
        </div>
        <div class="flex w-2/12">
            <x-jet-label class="mx-2 mt-1"  for="total">Total</x-jet-label>
            <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{number_format($campaignpresupuesto->total,2,',','.')}} €" disabled />
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
<div class="m-2 ">
    <x-button type="button" class="py-2 text-gray-400 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.presupuesto',$campaign->id) }}'" color="gray" >{{ __('Volver') }}</x-button>
 </div>

@push('scriptchosen')

<script>
</script>


@endpush
