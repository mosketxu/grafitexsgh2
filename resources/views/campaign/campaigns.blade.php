<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
    </div>

    <div class="pb-0 mx-2 space-y-1 border rounded-md">
        {{-- Datos campañas --}}
        {{-- titulos --}}
        <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-t-md ">
            <div class="w-1/12">#</div>
            <div class="w-3/12">Campaña</div>
            <div class="w-2/12">Fecha Inicio</div>
            <div class="w-2/12">Fecha Fin Prevista</div>
            <div class="w-1/12">Estado</div>
            <div class="w-3/12"></div>
        </div>
        {{-- {{ $campaigns }} --}}
        @foreach ($campaigns as $campaign)
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                <div class="w-1/12">{{$campaign->id}}</div>
                <div class="w-3/12">{{$campaign->campaign_name}}</div>
                <div class="w-2/12">{{$campaign->campaign_initdate}}</div>
                <div class="w-2/12">{{$campaign->campaign_enddate}}</div>
                <div class="w-1/12">{{$campaign->campaign_state}}</div>
                <div class="flex justify-between w-3/12">
                    @can('campaign.edit')
                        <div class="">
                        <a href="{{route('campaign.edit', $campaign->id )}}" title="Edit"><x-icon.edit class="w-6 text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.filtrar', $campaign) }}" title="Filtrar"><x-icon.filter class="text-black transform w-7 hover:text-black hover:scale-125"/></a>
                        </div>
                    @endcan
                    @can('campaign.index')
                        <div class="">
                            <a href="{{route('campaign.elementos', $campaign->id ) }}" title="Elementos"><x-icon.cubes class="text-green-500 w-7 "/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.galeria', $campaign->id ) }}" title="Galeria"><x-icon.images class="text-purple-700 w-7"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.etiquetas.pdf', $campaign->id ) }}" title="Etiquetas PDF"><x-icon.tags class="text-pink-700 w-7"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.etiquetas.index',$campaign->id) }}" target="_blank" title="Etiquetas HTML"><x-icon.code class="text-indigo-500 w-7"/></a>
                        </div>
                        <div class="">
                            <a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"><x-icon.location-dot class="text-teal-600 w-5"/></a>
                        </div>
                        @endcan
                    @can('presupuestos.index')
                    <div class="">
                        <a href="{{route('campaign.presupuesto', $campaign->id ) }}" title="Presupuesto"><x-icon.money class="text-blue-500"/></a>
                    </div>
                    @endcan
                    @can('campaign.index')
                        <div class="">
                            <a href="{{route('campaign.conteo', $campaign->id ) }}" title="Estadísticas"><x-icon.chart-column class="text-blue-500"/></a>
                        </div>
                    @endcan
                    @can('campaign.delete')
                        <form  action="{{route('campaign.delete',$campaign->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="_tokenCampaign" value="{{ csrf_token()}}" id="tokenCampaign">
                            <button type="submit" class="enlace"><x-icon.trash class="text-blue-500"/></a></button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
</div>
    <div class="mx-2 my-1">
        {{ $campaigns->appends(request()->except('page'))->links() }}
    </div>

@push('scriptchosen')


@endpush

