
@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Nuevo '.ucfirst($campo))
@section('titlePag','Nuevo '.ucfirst($campo))



<div class="">
        {{-- content header --}}
        <div class="content-header">
            <div class="container">
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
            <div class="container">
                <div class="card"  style="width:65%;">
                    <div class="card-header">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formelemento" role="form" method="POST" action="{{ route($route) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-sm-2 col-form-label col-form-label-sm" for="store">{{ucfirst($campo)}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-sm form-control" name="{{$campo}}" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a class="btn btn-default" href="{{route('auxiliares.index')}}" title="Ir la página anterior">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')

<script>
    $('#menumantenimiento').addClass('active');
    // $('#navelemento').toggleClass('activo');
</script>
<script>@include('_partials._errortemplate')</script>
@endpush
