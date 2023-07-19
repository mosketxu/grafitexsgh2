<div class="">
    <div class="">
        @include('errores')
    </div>
    <form id="formgaleria" role="form" method="post" action="{{ route('campaign.galeria.update') }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" id="campaigngaleria" name="campaigngaleria" value="{{$campaigngaleria}}">
        <div class="p-1 mx-2">
            @include('campaign.campaigncabecera')
        </div>
        <div class="flex w-full my-2 h-1/3">
            <div class="items-center w-9/12 pr-2 my-2 ml-4 space-y-2" >
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
            <div class="w-3/12 pl-2 mr-4">
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
