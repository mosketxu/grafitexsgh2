@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Elementos Campaña')
@section('titlePag','Elementos de la Campaña')
@section('navbar')
    @include('campaign._navbarcampaign')
@endsection




    <div class="">
        {{-- content header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto ">
                        <span class="m-0 h3 text-dark">@yield('titlePag')</span>
                        <span class="hidden" id="campaign_id"></span>
                    </div>
                    <div class="col-auto mr-auto">
                    </div>

                </div>
            </div>
        </div>
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="campaign_name">Campaña</label>
                                        <input type="text" class="form-control form-control-sm" id="campaign_name"
                                            name="campaign_name"
                                            value="{{ old('campaign_name',$campaign->campaign_name) }}" disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_initdate">Fecha Inicio</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                                            name="campaign_initdate"
                                            value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                                            disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_enddate">Fecha Finalización</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                                            name="campaign_enddate"
                                            value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- links  y cuadro busqueda --}}
                        <div class="row">
                            <div class="col-10 row">
                                {{ $elementos->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                                Hay {{$elementos->total()}} elementos &nbsp;&nbsp;
                                <a href="{{route('campaign.elementos.export',$campaign->id)}}" title="Exporta Excel"><i class="far fa-file-excel fa-2x text-success "></i></a></td>
                            </div>
                            <div class="float-right mb-2 col-2">
                                <form method="GET" action="{{route('campaign.elementos',$campaign) }}">
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
                            <table id="tcampaignElementos" class="table table-hover table-sm small sortable" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th class="d-none">#</th>
                                        <th id="tStore">Store</th>
                                        <th id="tName">Name</th>
                                        <th id="tCountry" class="text-center">Country</th>
                                        <th id="tArea">Area</th>
                                        <th id="tCountry" class="text-center">Idioma</th>
                                        <th id="tSegmento">Segmento</th>
                                        <th id="tStore">Store Concept</th>
                                        <th id="tUbicación">Ubicación</th>
                                        <th id="tMobiliario">Mobiliario</th>
                                        <th id="tProp">Prop x Elemento</th>
                                        <th id="tCarteleria">Carteleria</th>
                                        <th id="tMedida">Medida</th>
                                        <th id="tMaterial">Material</th>
                                        <th id="tUnit" class="text-center">Unit x Prop</th>
                                        <th id="tObservaciones">Observaciones</th>
                                        <th width="150px">Imagen </th>
                                        <th width="50px" class="text-center"><span class="ml-1">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($elementos as $elemento)
                                   <tr>
                                    <form id="form{{$elemento->id}}" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" class="d-none" name="elementoId" value="{{$elemento->id}}">
                                        <td class="d-none">{{$elemento->id}}</td>
                                        <td>{{$elemento->store_id}}</td>
                                        <td>{{$elemento->name}}</td>
                                        <td class="text-center">{{$elemento->country}}</td>
                                        <td>{{$elemento->area}}</td>
                                        <td class="text-center">{{$elemento->idioma}}</td>
                                        <td>{{$elemento->segmento}}</td>
                                        <td>{{$elemento->storeconcept}}</td>
                                        <td>{{$elemento->ubicacion}}</td>
                                        <td>{{$elemento->mobiliario}}</td>
                                        <td>{{$elemento->propxelemento}}</td>
                                        <td>{{$elemento->carteleria}}</td>
                                        <td>{{$elemento->medida}}</td>
                                        <td>{{$elemento->material}}</td>
                                        <td class="text-center">{{$elemento->unitxprop}}</td>
                                        <td>{{$elemento->observaciones}}</td>
                                        <td>
                                            <div class="row">
                                                <div>
                                                    @can('campaign.edit')
                                                    <input type="file" id="inputFile{{$elemento->id}}" name="photo" style="display:none">
                                                    @endcan
                                                    @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$elemento->imagen ))
                                                        <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}" alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                            id="original{{$elemento->id}}" class="img-fluid img-thumbnail"
                                                            style="width: 100px;cursor:pointer"
                                                            onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                                    @else
                                                        <img src="{{asset('storage/galeria/pordefecto.jpg')}}"  alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                            id="original{{$elemento->id}}" class="img-fluid img-thumbnail"
                                                            style="width: 100px;cursor:pointer"
                                                            onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                                    @endif
                                                </div>
                                                <div>
                                                    @can('campaign.edit')
                                                    <a href="#" name="Upload" onclick="subirImagenIndex('form{{$elemento->id}}','{{$elemento->id}}','{{$campaign->id}}')"><i class="mx-1 fas fa-upload text-info fa-2x"></i></a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                @can('campaign.edit')
                                                <a href="{{ route('campaign.elemento.editelemento',[$campaign->id,$elemento->id]) }}" title="Edit"><i class="mx-1 far fa-edit text-primary fa-2x"></i></a>
                                                @endcan
                                            </div>
                                        </td>
                                    </form>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default" href="{{route('campaign.index')}}" title="Ir la página anterior">Volver</a>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')

<script src="{{ asset('js/sortTable.js')}}"></script>
<script>
    $(document).ready(function() {

    });
   function subirImagenIndex(formulario,elementoId,campaignId){
        var token= $('#token').val();
        let timestamp = Math.floor( Date.now() );
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });

        var formElement = document.getElementById(formulario);
        var formData = new FormData(formElement);
        formData.append("elementoId", elementoId);

        $.ajax({
            type:'POST',
            url: "{{ route('campaign.elementos.updateimagenindex') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#'+formulario +' img').remove();
                $('#original'+elementoId).attr('src', '/storage/galeria/'+ campaignId+'/'+ data.imagen+'?ver=' + timestamp);
                toastr.info('Imagen actualizada con éxito','Imagen',{
                    "progressBar":true,
                    "positionClass":"toast-top-center"
                });
            },
            error: function(data){
                console.log(data);
                toastr.error("No se ha actualizado la imagen.<br>"+ data.responseJSON.message,'Error actualización',{
                    "closeButton": true,
                    "progressBar":true,
                    "positionClass":"toast-top-center",
                    "options.escapeHtml" : true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": 0,
                });
            }
        });
    }

    $('#menucampaign').addClass('active');
    $('#navelementos').toggleClass('activo');

</script>

@endpush
