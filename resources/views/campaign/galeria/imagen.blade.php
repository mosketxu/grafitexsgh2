<div class="">
    <div class="">
        @include('errores')
    </div>
    <form id="formgaleria" role="form" method="post" action="{{ route('campaign.galeria.update') }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" id="campaigngaleria" name="campaigngaleria" value="{{$campaigngaleria}}">
        <div class="p-1 mx-2">
            <div class="text-gray-500 border border-blue-300 rounded shadow-md">
                <div class="flex w-full p-1 bg-gray-100 rounded-md">
                    <div class="w-6/12 rounded-md">
                        <x-jet-label for="campaign_name">Campaña</x-jet-label>
                        <x-input.text type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                            name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                            disabled />
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="campaign_initdate">Fecha Inicio</x-jet-label>
                        <x-input.text type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                            name="campaign_initdate"
                            value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                            disabled />
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="campaign_enddate">Fecha Finalización</x-jet-label>
                        <x-input.text type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                            name="campaign_enddate"
                            value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                            disabled />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-1/3 flex my-2">
            <div class="w-9/12 space-y-2 my-2 ml-4 pr-2 items-center" >
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="carteleria">Carteleria</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" readonly class="my-0 border-none shadow-none" id="carteleria" name="carteleria" value="{{$campaigngaleria->carteleria}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="mobiliario">Mobiliario</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" readonly class="my-0 border-none shadow-none" id="mobiliario" name="mobiliario" value="{{$campaigngaleria->mobiliario}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="medida">Medida</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" readonly class="my-0 border-none shadow-none" id="medida" name="medida" value="{{$campaigngaleria->medida}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="imagen">Imagen</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" readonly class="my-0 border-none shadow-none" id="imagen" name="imagen" value="{{$campaigngaleria->imagen}}"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2/12">
                        <x-jet-label class="font-bold" for="observaciones">Observaciones</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text type="text" class="form-control" id="observaciones" name="observaciones" value="{{$campaigngaleria->observaciones}}"/>
                    </div>
                </div>
            </div>
            <div class="w-3/12 mr-4 pl-2">
                @livewire('campaigns.campaign-galeria',['campelemento'=>$campaigngaleria,'campaign'=>$campaign,'ruta'=>'campaign.galeria.edit'],key($campaigngaleria->id))
            </div>
        </div>
        <div class="p-2">
            <div class="pb-2 mx-2 my-2">
                @can('campaign.edit')
                <x-button.primary type="submit">ACTUALIZAR</x-button.primary>
                @endcan
                <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.galeria',$campaign) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
            </div>
        </div>
    </form>
</div>

@push('scriptchosen')

<script>

</script>


@endpush
