<div class="">
    <div class="p-1 mx-2">
        <div class="flex w-full ">
            <div class="w-11/12">
                @include('campaign.campaigncabecera')
            </div>
            <div class="w-1/12 text-center">
                <div class="text-center">
                    <label for="xls">Hay {{$totalGaleria}} imágenes.</label>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full px-2">
            <div class="m-2">
                {{ $campaigngaleria->appends(request()->except('page'))->links() }}
            </div>
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full">
                        <th class="w-1/12 pl-2">#</th>
                        <th class="w-2/12">Mobiliario</th>
                        <th class="w-2/12">Carteleria</th>
                        <th class="w-2/12">Medidas</th>
                        {{-- <th class="w-1/12">Elemento</th> --}}
                        <th class="w-2/12">Observaciones</th>
                        <th class="w-1/12">Eci</th>
                        {{-- <th class="w-2/12">Imagen</th> --}}
                        <th class="w-1/12">Img</th>
                        <th class="w-1/12" class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 70vh;">
                    @foreach ($campaigngaleria as $imagen)
                    {{-- {{ $imagen }} --}}
                    <tr class="flex items-center w-full">
                        <td class="w-1/12 pl-2">{{$imagen->id}}</td>
                        <td class="w-2/12">{{$imagen->mobiliario}}</td>
                        <td class="w-2/12">{{$imagen->carteleria}}</td>
                        <td class="w-2/12">{{$imagen->medida}}</td>
                        {{-- <td class="w-1/12">{{$imagen->elemento}}</td> --}}
                        <td class="w-2/12">{{$imagen->observaciones}}</td>
                        <td class="w-1/12">{{$imagen->ECI}}</td>
                        {{-- <td class="w-2/12" id="imagen{{$imagen->id}}">{{$imagen->imagen}}</td> --}}
                        <td class="w-1/12">
                            @livewire('campaigns.campaign-galeria',['campelemento'=>$imagen,'campaign'=>$campaign,'ruta'=>'campaign.galeria'],key($imagen->id))
                        </td>
                        <td class="w-1/12 text-center">
                            @can('campaign.edit')
                            <x-icon.edit-a href="{{ route('campaign.galeria.editgaleria',[$campaign->id,$imagen->id]) }}" title="Edit" class=""/>
                            @endcan
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scriptchosen')

<script>

</script>

@endpush
