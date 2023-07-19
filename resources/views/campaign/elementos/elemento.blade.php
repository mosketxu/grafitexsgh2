<div class="h-full p-1 mx-2">
    @include('campaign.campaigncabecera')
</div>
<div class="">
    @livewire('campaigns.campaign-elementos',['campelemento'=>$campaignelemento,'campaign'=>$campaign,'ruta'=>'campaign.elemento'],key($campaignelemento->id))
</div>

@push('scriptchosen')

<script>

</script>


@endpush
