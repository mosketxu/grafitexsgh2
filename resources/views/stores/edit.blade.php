@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Editar Store')
@section('titlePag','Edición de Stores')




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
                    <h5 class="text-primary">{{$store->id}} {{$store->name}} </h5>
                </div>
                <form id="formstore" role="form" method="post" action="{{ route('store.update',$store->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="name">Nombre</label>
                                        <input  type="text" class="form-control form-control-sm" id="name" name="name" value="{{old('name',$store->name)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="country">Luxotica</label>
                                        <select class="form-control form-control-sm" id="luxotica" name="luxotica" >
                                            <option value="Oliver Peoples" {{old('luxotica','ES'==$store->luxotica) ? 'selected' : ''}}>Oliver Peoples</option>
                                            <option value="Ray-Ban Store" {{old('country','PT'==$store->country) ? 'selected' : ''}}>Ray-Ban Store</option>
                                            <option value="Sunglass Hut" {{old('country','PT'==$store->country) ? 'selected' : ''}}>Sunglass Hut</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="country">Country</label>
                                        <select class="form-control form-control-sm" id="country" name="country" >
                                            <option value="ES" {{old('country','ES'==$store->country) ? 'selected' : ''}}>ES</option>
                                            <option value="PT" {{old('country','PT'==$store->country) ? 'selected' : ''}}>PT</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="country">Idioma</label>
                                        <select class="form-control form-control-sm" id="idioma" name="idioma" >
                                            <option value="ES" {{old('idioma','ES'==$store->idioma) ? 'selected' : ''}}>ES</option>
                                            <option value="CAT" {{old('idioma','CAT'==$store->idioma) ? 'selected' : ''}}>CAT</option>
                                            <option value="PT" {{old('idioma','PT'==$store->idioma) ? 'selected' : ''}}>PT</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="area">Area</label>
                                        <select class="form-control form-control-sm" id="area_id" name="area_id" >
                                            @foreach($areas as $area )
                                            <option value="{{$area->id}}" {{old('area_id',$area->id==$store->area_id) ? 'selected' : ''}}>{{$area->area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="segmento">Segmento</label>
                                        <select class="form-control form-control-sm" id="segmento" name="segmento" >
                                            @foreach($segmentos as $segmento )
                                            <option value="{{$segmento->id}}" {{old('segmento',$segmento->id==$store->segmento_id) ? 'selected' : ''}}>{{$segmento->segmento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="channel">Channel</label>
                                        <select class="form-control form-control-sm" id="channel" name="channel" >
                                            <option value="{{$store->channel}}" selected>{{$store->channel}}</option>
                                            <option value="Airport">Airport</option>
                                            <option value="Dpt.Store">Dpt.Store</option>
                                            <option value="Mall">Mall</option>
                                            <option value="Outlet">Outlet</option>
                                            <option value="Street">Street</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="store_cluster">Cluster</label>
                                        <select class="form-control form-control-sm" id="store_cluster" name="store_cluster" >
                                            <option value="{{$store->store_cluster}}" selected>{{$store->store_cluster}}</option>
                                            <option value="Basic">Basic</option>
                                            <option value="ECI">ECI</option>
                                            <option value="INLINE">INLINE</option>
                                            <option value="OPEN AIR">OPEN AIR</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="concepto">Concepto</label>
                                        <select class="form-control form-control-sm" id="concepto_id" name="concepto_id" >
                                            @foreach($conceptos as $concepto )
                                            <option value="{{$concepto->id}}" {{old('concepto_id',$concepto->id==$store->concepto_id) ? 'selected' : ''}}>{{$concepto->storeconcept}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="concepto">Furniture Type</label>
                                        <select class="form-control form-control-sm" id="furniture_type" name="furniture_type" >
                                            @foreach($furnitures as $furniture )
                                            <option value="{{$furniture->furniture_type}}" {{old('furniture_type',$furniture->furniture_type==$store->furniture_type) ? 'selected' : ''}}>{{$furniture->furniture_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address" id="address" value="{{old('address',$store->address)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control form-control-sm" name="city" id="city" value="{{old('city',$store->city)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control form-control-sm" name="province" id="province" value="{{old('province',$store->province)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="cp">Postal Code</label>
                                        <input type="text" class="form-control form-control-sm" name="cp" id="cp" value="{{old('cp',$store->cp)}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="phone">phone</label>
                                        <input  type="text" class="form-control form-control-sm" id="phone" name="phone" value="{{old('phone',$store->phone)}}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="email">email</label>
                                        <input  type="email" class="form-control form-control-sm" id="email" name="email" value="{{old('email',$store->email)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="winterschedule">Winter Schedule</label>
                                        <input  type="text" class="form-control form-control-sm" id="winterschedule" name="winterschedule" value="{{old('winterschedule',$store->winterschedule)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="summerschedule">Summer Schedule</label>
                                        <input  type="text" class="form-control form-control-sm" id="summerschedule" name="summerschedule" value="{{old('summerschedule',$store->summerschedule)}}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="deliverytime">deliverytime</label>
                                        <input  type="text" class="form-control form-control-sm" id="deliverytime" name="deliverytime" value="{{old('deliverytime',$store->deliverytime)}}">
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col">
                                        <label for="observaciones">observaciones</label>
                                        <input  type="text" class="form-control form-control-sm" id="observaciones" name="observaciones" value="{{old('observaciones',$store->observaciones)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <img src="{{asset('storage/store/'.$store->imagen)}}" alt={{$store->imagen}} title={{$store->imagen}}
                                class="img-fluid img-thumbnail" style="max-height: 400px; ">
                                <input type="hidden" name="imagen" value="{{$store->imagen}}" readonly>
                                @can('store.edit')
                                <input type="file" name="photo" value="">
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('store.index')}}" type="button" class="btn btn-default">Volver</a>
                        @can('store.edit')
                        <button type="button" class="btn btn-primary" name="Guardar" onclick="form.submit()">Actualizar</button>
                        @endcan
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
    // $('#navgaleria').toggleClass('activo');
</script>

<script>@include('_partials._errortemplate')</script>

@endpush
