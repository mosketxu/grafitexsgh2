<div class="">
    <div class="p-1 mx-2">
        {{-- <div class="text-gray-500 border border-blue-300 rounded shadow-md"> --}}
            <div class="flex w-full ">
                <div class="w-11/12">
                    @include('campaign.campaigncabecera')
                </div>
                <div class="w-1/12 text-center">
                    <div class="w-6 mx-auto text-center">
                        <x-icon.xls-a id="xls" href="{{route('campaign.elementos.export',$campaign->id)}}" class="w-6 mt-5 text-green-700" title="Exporta Excel"/>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
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
