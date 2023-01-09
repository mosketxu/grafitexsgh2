<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            aqui los filtros de las campañas
            {{-- @include('campaigns.campaignsfilters')  --}}
            @can('campaign.create')
                <a href="" role="button" data-toggle="modal" data-target="#campaignCreateModal">
                    <i class="mt-2 fas fa-plus-circle fa-2x text-primary"></i>
                </a>
            @endcan
        </div>
    </div>

    <div class="pb-0 mx-2 space-y-1 border rounded-md">
        {{-- Datos campañas --}}
        <div class="">
        {{-- titulos --}}
        <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-t-md ">
            <div class="w-1/12">#</div>
            <div class="w-3/12">Campaña</div>
            <div class="w-2/12">Fecha Inicio</div>
            <div class="w-2/12">Fecha Fin Prevista</div>
            <div class="w-1/12">Estado</div>
            <div class="w-3/12"></div>
        </div>
        <div class="">
            {{ $campaigns->appends(request()->except('page'))->links() }}
        </div>
        @foreach ($campaigns as $campaign)
            <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                <div class="w-1/12">{{$campaign->id}}</div>
                <div class="w-3/12">{{$campaign->campaign_name}}</div>
                <div class="w-2/12">{{$campaign->campaign_initdate}}</div>
                <div class="w-2/12">{{$campaign->campaign_enddate}}</div>
                <div class="w-1/12">{{$campaign->campaign_state}}</div>
                <div class="w-3/12 flex">
                    @can('campaign.edit')
                    <div class="">
                            <a href="{{route('campaign.edit', $campaign->id )}}" title="Edit"><x-icon.edit class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.filtrar', $campaign->id) }}" title="Filtrar"><x-icon.filter class="text-blue-500"/></a>
                        </div>
                        @endcan
                        @can('campaign.index')
                        <div class="">
                            <a href="{{route('campaign.elementos', $campaign->id ) }}" title="Elementos"><x-icon.cubes class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.galeria', $campaign->id ) }}" title="Galeria"><x-icon.images class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.etiquetas.pdf', $campaign->id ) }}" title="Etiquetas"><x-icon.tags class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.etiquetas.index',$campaign->id) }}" title="Etiquetas HTML"><x-icon.code class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"><x-icon.location-dot class="text-blue-500"/></a>
                        </div>
                        <div class="">
                            <a href="{{route('campaign.conteo', $campaign->id ) }}" title="Estadísticas"><x-icon.chart-column class="text-blue-500"/></a>
                        </div>
                        @endcan
                        @can('presupuesto.index')
                        <div class="">
                            <a href="{{route('campaign.presupuesto', $campaign->id ) }}" title="Presupuesto"><x-icon.money class="text-blue-500"/></a>
                        </div>
                        @endcan
                        @can('campaign.destroy')
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
        <!-- Modal -->
        AQUI VA EL MODAL
        <div class="modal fade" id="campaignCreateModal" tabindex="-1" role="dialog" aria-labelledby="campaignCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="campaignCreateModalLabel">Nueva campaña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('campaign.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                        <label for="campaign_name">Campaña</label>
                                        <input type="text" class="form-control form-control-sm" id="campaign_name" name="campaign_name" value="{{ old('campaign_name') }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="campaign_initdate">Fecha Inicio</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_initdate" name="campaign_initdate" value="{{ old('campaign_initdate') }}"/>
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_enddate">Fecha Finalización</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_enddate" name="campaign_enddate" value="{{ old('campaign_enddate') }}"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" name="Guardar" onclick="form.submit()">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')


@endpush

