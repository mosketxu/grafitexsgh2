@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Familias Tarifas')
@section('titlePag','Tarifas Familias')
@section('navbar')
@include('tarifa._navbartarifa')
@endsection




<div class="">
    {{-- content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto ">
                    <span class="h3 m-0 text-dark">@yield('titlePag')</span>
                </div>
                <div class="col-auto mr-auto">
                    <a href="" role="button" data-toggle="modal" data-target="#tarifaFamiliaCreateModal">
                        <i class="fas fa-plus-circle fa-2x text-primary mt-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    {{-- main content  --}}
    <section class="content">
        <div class="container-fluid">
            <div class="card ">
                <div class="card-header">
                </div>
                <div class="card-body">
                    {{-- links  y cuadro busqueda --}}
                    <div class="row">
                        <div class="col-10 row">
                            {{ $tarifafamilias->appends(request()->except('page'))->links() }}
                        </div>
                        <div class="col-2 float-right mb-2">
                            <form method="GET" action="{{route('tarifafamilia.index') }}">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-search fa-sm text-primary"></i>
                                        </span>
                                    </div>
                                    <input id="busca" name="busca" type="text" class="form-control" name="search"
                                        value='{{$busqueda}}' placeholder="Search for..." />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card collapsed-card">
                        {{-- card-header --}}
                        <div class="card-header text-black bg-white}} p-0" data-card-widget="collapse" style="cursor: pointer">
                            <h3 class="card-title pl-3">{{$sinidentificar->familia}}  </h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm small" cellspacing="0" width=100%>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Material</th>
                                            <th>Medida</th>
                                            <th>Familia</th>
                                            <th width="150px" class="">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sinidentificar->tarifafamilias as $familia)
                                        <form id="form{{$familia->id}}" role="form" method="post" action="{{ route('tarifafamilia.update') }}" >
                                            @method('PUT')
                                            @csrf
                                            <tr>
                                                <input type="hidden" name="id" value="{{$familia->id}}" >
                                                <td><span class="badge text-gray">{{$familia->id}}</span></td>
                                                <td><input class="form-control-plaintext" type="text" name="material" value="{{$familia->material}}"/></td>
                                                <td><input class="form-control-plaintext" type="text" name="medida" value="{{$familia->medida}}"/></td>
                                                <td>
                                                    <select name="tarifa_id" id="tarifa_id" onchange="update('form{{$familia->id}}',{{$familia->id}})" class="form-control-plaintext my-0 py-0">
                                                        <option value="{{$familia->tarifa_id}}" selected>{{$sinidentificar->familia}}</option>
                                                        @foreach($familias as $tarifa)
                                                        <option value="{{$tarifa->id}}">{{$tarifa->familia}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td width="150px">
                                                    <div class="row">
                                                        <button type="submit" class="enlace">
                                                            <i class="far fa-edit text-primary fa-2x mx-1"></i>
                                                        </button>
                                        </form>
                                        <form role="form" method="post" action="{{ route('tarifafamilia.destroy',$familia->id) }}">
                                            @csrf
                                            @method('DELETE')
                                                        <button type="submit" class="enlace">
                                                            <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">{{$i=0}}</div>
                    @foreach ($tarifafamilias as $tarifafamilia)
                    {{-- <div class="card collapsed-card"> --}}
                    <div class="card collapsed-card">
                        {{-- card-header --}}

                        {{-- <div class="card-header text-white bg-{{$colors[rand(0,16)]}} p-0" data-card-widget="collapse" style="cursor: pointer"> --}}
                        <div class="card-header text-white bg-{{$colors[$i++]}} p-0" data-card-widget="collapse" style="cursor: pointer">
                            @if ($i>16)
                                <div class="d-none">{{$i=0}}</div>
                            @endif
                            <h3 class="card-title pl-3">{{$tarifafamilia->familia}}  </h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm small" cellspacing="0" width=100%>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Material</th>
                                            <th>Medida</th>
                                            <th>Familia</th>
                                            <th width="150px" class="">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tarifafamilia->tarifafamilias as $familia)
                                        {{-- <form  action="{{ route('tarifafamilia.update',$familia->id) }}" method="post"> --}}
                                        <form id="form{{$familia->id}}" role="form" method="post" action="{{ route('tarifafamilia.update') }}" >
                                            @method('PUT')
                                            @csrf
                                            <tr>
                                                {{-- <input type="hidden" name="_token{{$familia->id}}" value="{{ csrf_token()}}" id="token{{$familia->id}}"> --}}
                                                <input type="hidden" name="id" value="{{$familia->id}}" >
                                                <td><span class="badge text-gray">{{$familia->id}}</span></td>
                                                <td><input class="form-control-plaintext" type="text" name="material" value="{{$familia->material}}"/></td>
                                                <td><input class="form-control-plaintext" type="text" name="medida" value="{{$familia->medida}}"/></td>
                                                <td>
                                                    <select name="tarifa_id" id="tarifa_id" onchange="update('form{{$familia->id}}',{{$familia->id}})" class="form-control-plaintext my-0 py-0">
                                                        <option value="{{$familia->tarifa_id}}" selected>{{$tarifafamilia->familia}}</option>
                                                        @foreach($familias as $tarifa)
                                                        <option value="{{$tarifa->id}}">{{$tarifa->familia}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td width="150px">
                                                    <div class="row">
                                                        <button type="submit" class="enlace">
                                                            <i class="far fa-edit text-primary fa-2x mx-1"></i>
                                                        </button>
                                        </form>
                                        <form role="form" method="post" action="{{ route('tarifafamilia.destroy',$familia->id) }}">
                                            @csrf
                                            @method('DELETE')
                                                        <button type="submit" class="enlace">
                                                            <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tarifaFamiliaCreateModal" tabindex="-1" role="dialog"
            aria-labelledby="tarifaFamiliaCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tarifaFamiliaCreateModalLabel">Nueva Familia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('tarifafamilia.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group col">
                                <label for="material">Material</label>
                                <input type="text" class="form-control form-control-sm" id="material" name="material"
                                    value="{{ old('material') }}" />
                            </div>
                            <div class="form-group col">
                                <label for="medida">Medida</label>
                                <input type="text" class="form-control form-control-sm" id="medida" name="medida"
                                    value="{{ old('medida') }}" />
                            </div>
                            <div class="form-group col">
                                <label for="tarifa_id">Familia</label>
                                <select name="tarifa_id" id="tarifa_id" class="form-control form-control-sm">
                                    @foreach($tarifafamilias as $tarifa)
                                    <option value="{{$tarifa->id}}">{{$tarifa->familia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" name="Guardar"
                                onclick="form.submit()">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scriptchosen')

{{-- <script src="{{ asset('js/sortTable.js')}}"></script> --}}
<script>
    @include('_partials._errortemplate')
</script>


<script>
   function update(formulario,id) {
    var token= $('#token').val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });
    var formElement = document.getElementById(formulario);
    var formData = new FormData(formElement);

    $.ajax({
        type:'POST',
            url: "{{ route('tarifafamilia.update') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
        success: function(data) {
            console.log(data);
            toastr.info('Asignacion actualizada con éxito',{
                    "progressBar":true,
                    "positionClass":"toast-top-center"
                });
            },
        error: function(data){
            console.log(data);
            toastr.error("No se ha actualizado la asignacion",{
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

</script>
<script>
    $(document).ready(function() {

    });

    $('#menutarifa').addClass('active');
    $('#navfamilias').toggleClass('activo');

</script>

@endpush
