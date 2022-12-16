@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Editar Elemento')
@section('titlePag','Editar Elemento')




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
                        </div>
                    </div>
                    <form role="form" method="POST" action="{{ route('elemento.update',$elemento->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="ubicacion_id">Ubicación</label>
                                    <p>{{$elemento->ubicacion}}</p>
                                    {{-- <select class="form-control form-control-sm" id="ubicacion_id" name="ubicacion_id">
                                        @foreach($ubicaciones as $ubicacion )
                                        <option value="{{$ubicacion->id}}" {{old('ubicacion_id',$ubicacion->id)==$ubicacion->id ? 'selected' : ''}}>{{$ubicacion->ubicacion}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="mobiliario_id">Mobiliario</label>
                                    <p>{{$elemento->mobiliario}}</p>
                                    {{-- <select class="form-control form-control-sm" id="mobiliario_id" name="mobiliario_id" >
                                        @foreach($mobiliarios as $mobiliario )
                                        <option value="{{$mobiliario->id}}" {{old('mobiliario_id',$mobiliario->id)==$elemento->mobiliario_id ? 'selected' : ''}}>{{$mobiliario->mobiliario}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="propxelemento_id">Prop x Elemento</label>
                                    <p>{{$elemento->propxelemento}}</p>
                                    {{-- <select class="form-control form-control-sm" id="propxelemento_id" name="propxelemento_id" >
                                        @foreach($propxelementos as $propxelemento )
                                        <option value="{{$propxelemento->id}}" {{old('propxelemento_id',$propxelemento->id)==$elemento->propxelemento_id ? 'selected' : ''}}>{{$propxelemento->propxelemento}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="carteleria_id">Carteleria</label>
                                    <p>{{$elemento->carteleria}}</p>
                                    {{-- <select class="form-control form-control-sm" id="carteleria_id" name="carteleria_id" >
                                        @foreach($cartelerias as $carteleria )
                                        <option value="{{$carteleria->id}}" {{old('carteleria_id',$carteleria->id)==$elemento->carteleria_id ? 'selected' : ''}}>{{$carteleria->carteleria}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="medida_id">Medida</label>
                                    <p>{{$elemento->medida}}</p>
                                    {{-- <select class="form-control form-control-sm" id="medida_id" name="medida_id" >
                                        @foreach($medidas as $medida )
                                        <option value="{{$medida->id}}" {{old('medida_id',$medida->id)==$elemento->medida_id ? 'selected' : ''}}>{{$medida->medida}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="material_id">Material</label>
                                    <p>{{$elemento->material}}</p>
                                    {{-- <select class="form-control form-control-sm" id="material_id" name="material_id" >
                                        @foreach($materiales as $material )
                                        <option value="{{$material->id}}" {{old('material_id',$material->id)==$elemento->material_id ? 'selected' : ''}}>{{$material->material}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group col">
                                    <label for="unitxprop">Uds</label>
                                    <p>{{$elemento->unitxprop}}</p>
                                    {{-- <select class="form-control form-control-sm" id="unitxprop" name="unitxprop" >
                                        @for($i = 1; $i<20; $i++)
                                        <option value="{{$i}}" {{old('unitxprop',$i)==$elemento->unitxprop ? 'selected' : ''}}>{{$i}}</option>
                                        @endfor
                                    </select> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2">
                                    <label for="material_id">Familia</label>
                                    <select class="form-control form-control-sm" id="familia_id" name="familia_id" >
                                        @foreach($familias as $familia )
                                        <option value="{{$familia->id}}" {{old('familia_id',$familia->id)==$elemento->familia_id ? 'selected' : ''}}>{{$familia->familia}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="observaciones">Observaciones</label>
                                    <input  type="text" class="form-control form-control-sm" id="observaciones" name="observaciones" value="{{old('observaciones',$elemento->observaciones)}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('elemento.index')}}" type="button" class="btn btn-default">Volver</a>
                            @can('elemento.edit')
                            <input class="btn btn-primary" type="submit" value="Actualizar">
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')

<script>
    $('#menuelementos').addClass('active');
    $('#navelemento').toggleClass('activo');
</script>
<script>@include('_partials._errortemplate')</script>

@endpush
