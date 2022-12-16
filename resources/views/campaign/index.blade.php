@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Campañas')
@section('titlePag','Campañas')






    <div class="">
        {{-- content header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto ">
                        <span class="m-0 h3 text-dark">@yield('titlePag')</span>
                    </div>
                    <div class="col-auto mr-auto">
                        @can('campaign.create')
                        <a href="" role="button" data-toggle="modal" data-target="#campaignCreateModal">
                            <i class="mt-2 fas fa-plus-circle fa-2x text-primary"></i>
                        </a>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
        {{-- - /.content-header --}}
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        {{-- links  y cuadro busqueda --}}
                        <div class="row">
                            <div class="col-10 row">
                                {{ $campaigns->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                                Hay {{$campaigns->total()}} campañas.
                            </div>
                            <div class="float-right mb-2 col-2">
                                <form method="GET" action="{{route('campaign.index') }}">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search fa-sm text-primary"></i></span>
                                        </div>
                                        <input id="busca" name="busca"  type="text" class="form-control" name="search" value='{{$busqueda}}' placeholder="Search for..."/>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tCampaigns" class="table table-hover table-sm small" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Campaña</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin Prevista</th>
                                        <th>Estado</th>
                                        <th width="400px"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($campaigns as $campaign)
                                    <tr id="t{{$campaign->id}}">
                                        <td>{{$campaign->id}}</td>
                                        <td>{{$campaign->campaign_name}}</td>
                                        <td>{{$campaign->campaign_initdate}}</td>
                                        <td>{{$campaign->campaign_enddate}}</td>
                                        <td>{{$campaign->campaign_state}}</td>
                                        <td>
                                            {{-- <form  action="#" method="post"> --}}
                                            <form  action="{{route('campaign.delete',$campaign->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="_tokenCampaign" value="{{ csrf_token()}}" id="tokenCampaign">
                                                @can('campaign.edit')
                                                <a href="{{route('campaign.filtrar', $campaign->id) }}" title="Filtrar"><i class="mx-1 fas fa-filter text-navy fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a href="{{route('campaign.elementos', $campaign->id ) }}" title="Elementos"><i class="mr-1 far fas fa-cubes text-teal fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a href="{{route('campaign.galeria', $campaign->id ) }}" title="Galeria"><i class="mr-1 far fa-images text-purple fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a href="{{route('campaign.etiquetas.pdf', $campaign->id ) }}" title="Etiquetas"><i class="mr-1 fas fa-tags text-maroon fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a href="{{route('campaign.etiquetas.index',$campaign->id) }}" title="Etiquetas HTML"><i class="mr-1 fas fa-code text-indigo fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"><i class="mr-1 fas fa-map-marker-alt text-info fa-2x"></i></a>
                                                @endcan
                                                @can('presupuesto.index')
                                                <a href="{{route('campaign.presupuesto', $campaign->id ) }}" title="Presupuesto"><i class="mr-1 fas fa-money-check-alt text-fuchsia fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.index')
                                                <a href="{{route('campaign.conteo', $campaign->id ) }}" title="Estadísticas"><i class="mr-3 fas fa-chart-bar text-orange fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.edit')
                                                <a href="{{route('campaign.edit', $campaign->id )}}" title="Edit"><i class="ml-3 far fa-edit text-primary fa-2x"></i></a>
                                                @endcan
                                                @can('campaign.destroy')
                                                <button type="submit" class="enlace"><i class="ml-1 far fa-trash-alt text-danger fa-2x"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
        </section>
    </div>
@endsection

@push('scriptchosen')

<script src="{{ asset('js/datatablesdefault.js')}}"></script>

<script>
    @include('_partials._errortemplate')
</script>


<script>
    $(document).ready( function () {
        $('#menucampaign').addClass('active');
        $('#navcampaigns').toggleClass('activo');
    });
</script>


@endpush

