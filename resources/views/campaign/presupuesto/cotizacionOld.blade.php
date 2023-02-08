@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Presupuesto Editar')
@section('titlePag','Edición del presupuesto')
@section('navbar')
{{-- @include('campaign._navbarcampaign') --}}
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
               @can('presupuesto.edit')
               <a href="{{route('campaign.presupuesto.refresh',[$campaignpresupuesto->campaign_id,$campaignpresupuesto->id])}}" role="button" title="Refrescar tarifas">
                  <i class="mt-2 fas fa-sync-alt fa-2x text-primary"></i>
               </a> &nbsp;&nbsp;
               @endcan
               @can('presupuesto.index')
               <a href="{{route('campaign.presupuesto.pdfPresupuesto',$campaignpresupuesto->id)}}" role="button" title="Imprimir Presupuesto">
                  <i class="mt-2 far fa-file-pdf fa-2x text-danger"></i>
               </a>
               @endcan
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
                  <div class="form-group col">
                     <label for="campaign_name">Campaña</label>
                     <input type="text" class="form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                  </div>
                  <div class="form-group col">
                     <label for="campaign_initdate">Fecha Inicio</label>
                     <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}" disabled />
                  </div>
                  <div class="form-group col">
                     <label for="campaign_enddate">Fecha Finalización</label>
                     <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate" value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="form-group col">
                           <label class="form-label-sm" for="referencia">Referencia<span
                                 class="badge badge-primary navbar-badge">{{$campaignpresupuesto->id}}</span></label>
                           <input type="text" class="form-control-sm form-control" id="referencia" name="referencia"
                              value="{{$campaignpresupuesto->referencia}}" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="form-label-sm" for="version">Versión</label>
                           <input type="number" class="form-control-sm form-control" id="version" name="version"
                              step="0.1" value="{{$campaignpresupuesto->version}}" readonly>
                        </div>
                        <div class="form-group col-2">
                           <label class="form-label-sm" for="fecha">Fecha</label>
                           <input type="text" class="form-control-sm form-control" id="fecha" name="fecha"
                              value="{{date('d/m/Y', strtotime($campaignpresupuesto->fecha))}}" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="float-right mr-3 form-label-sm" for="total">Total</label>
                           <input type="text" class="text-right form-control-sm form-control" id="total" name="total"
                              value="{{number_format($campaignpresupuesto->total,2,',','.')}} €" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="form-label-sm" for="estado">Estado</label>
                           <input type="text" class="form-control-sm form-control" id="estado" name="estado"
                              value="{{$campaignpresupuesto->estado}}" readonly>
                        </div>
                        <div class="form-group col">
                           <label class="form-label-sm" for="observaciones">Observaciones</label>
                           <input type="text" class="form-control-sm form-control" id="observaciones"
                              name="observaciones" value="{{$campaignpresupuesto->observaciones}}" readonly>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-6">
                           <div class="col">
                           {{-- Promedios --}}
                           <div class="card">
                                 {{-- titulo card --}}
                              <div class="p-0 text-white card-header bg-teal" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="pl-3 card-title">Datos Presupuesto</h3>
                                 <div class="pr-3 card-tools">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                                 </div>
                              </div>
                              {{-- tabla presupuesto materiales --}}
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table class="table table-hover table-sm small sortable"
                                       cellspacing="0" width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-center">Zona</th>
                                             <th class="text-center">Nº Stores</th>
                                             <th class="text-center">Totales</th>
                                             <th class="text-center">Promedio<br/>Total</th>
                                             <th class="text-center">Promedio<br/>Zona</th>
                                             <th class="text-center">Picking</th>
                                             <th class="text-center">Transp.</th>
                                          </tr>
                                       </thead>
                                       @if(count($promedios)>0)
                                       <tbody>
                                          @foreach($promedios as $promedio)
                                          <tr>
                                             <td class="py-1 my-0 text-center">{{$promedio->zona}}</td>
                                             <td class="py-1 my-0 text-center">{{$promedio->stores}}</td>
                                             <td class="py-1 my-0 text-center">{{number_format($promedio->totalzona,2,',','.')}}</td>
                                             <td class="py-1 my-0 text-center">{{number_format($promedio->total / $promedio->totalstores,2,',','.')}}</td>
                                             <td class="py-1 my-0 text-center">{{number_format($promedio->totalzona / $promedio->totalstores,2,',','.')}}</td>
                                             <td class="py-1 my-0 text-center">{{number_format($promedio->picking,2,',','.')}}</td>
                                             <td class="py-1 my-0 text-center">{{number_format($promedio->transporte,2,',','.')}}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                       @endif
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col">
                              <div class="card">
                                 <div class="p-0 text-white card-header bg-warning" data-card-widget="collapse"
                                       style="cursor: pointer">
                                    <h3 class="pl-3 card-title">Extras</h3><span class="ml-3 sumTotExtra">
                                       {{number_format($totalExtras,2,',','.')}}</span>
                                    <div class="pr-3 card-tools">
                                       <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <div class="table-responsive">
                                       <table id="tExtra" class="table table-hover table-sm small sortable" cellspacing="0" width=100%>
                                          <thead>
                                             <tr>
                                                <th class="text-center">Extra</th>
                                                <th class="text-center" width="10%">Zona</th>
                                                <th class="text-center" width="10%">Uds</th>
                                                <th class="text-center" width="10%">€/ud.</th>
                                                <th class="text-center" width="10%">Total <br /></th>
                                                <th class="text-center">Obs.</th>
                                                <th class="text-center" width="15%">Actions</th>
                                             </tr>
                                          </thead>
                                          @if(count($extras)>0)
                                          <tbody>
                                             @foreach($extras as $extra)
                                                <form id="form{{$extra->id}}" role="form" method="post" action="{{ route('campaign.presupuesto.extra.delete',$extra->id) }}">
                                                   <input type="hidden" name="_tokenExtra{{$extra->id}}" value="{{ csrf_token()}}" id="tokenExtra{{$extra->id}}">
                                                   @csrf
                                                   @method('DELETE')
                                                   <tr class="editarTr" id="{{$extra->id}}"><span class="d-none" id="sum{{$extra->id}}">sumTotExtra</span>
                                                      <input type="hidden" name="presupuesto_id" value="{{$extra->presupuesto_id}}" readonly="readonly">
                                                      <input type="hidden" name="tipo" value="2" readonly="readonly">
                                                      <input type="checkbox" id="check{{$extra->id}}" style="display:none">
                                                      {{-- concepto --}}
                                                      <td class="py-1 my-0">
                                                         <input type="text" id="concepto{{$extra->id}}"
                                                            class="px-1 py-0 my-0 text-left form-control-plaintext input-sm"
                                                            name="concepto" value="{{$extra->concepto}}" readonly="readonly">
                                                      </td>
                                                      {{-- zona --}}
                                                      <td class="py-1 my-0">
                                                         <span id="totLabel{{$extra->id}}"
                                                            class="px-2 py-0 my-0 form-control-plaintext text-centar text-primary">
                                                            {{$extra->zona}}
                                                         </span>
                                                      </td>
                                                      {{-- uds --}}
                                                      <td class="py-1 my-0">
                                                         <input type="text" id="unidades{{$extra->id}}"
                                                            class="px-2 py-0 my-0 text-center form-control-plaintext input-sm"
                                                            name="unidades" onchange="totalizar({{$extra->id}})"
                                                            value="{{$extra->unidades}}" readonly="readonly">
                                                      </td>
                                                      {{-- €/ud --}}
                                                      <td class="py-1 my-0">
                                                         <input type="text" id="preciounidad{{$extra->id}}"
                                                            class="px-2 py-0 my-0 text-right form-control-plaintext input-sm"
                                                            name="preciounidad" onchange="totalizar({{$extra->id}})"
                                                            value="{{number_format($extra->preciounidad,2,',','.')}}"
                                                            readonly="readonly">
                                                      </td>
                                                      {{-- total --}}
                                                      <td class="py-1 my-0">
                                                         <input type="hidden" id="total{{$extra->id}}"
                                                            class="px-2 py-0 my-0 form-control-plaintext item input-sm" name="total"
                                                            value="{{$extra->total}}" readonly="readonly">
                                                            <span id="totLabel{{$extra->id}}"
                                                               class="px-2 py-0 my-0 text-right form-control-plaintext text-primary">
                                                               {{number_format($extra->total,2,',','.')}}
                                                            </span>
                                                      </td>
                                                      {{-- obs --}}
                                                      <td class="py-1 my-0">
                                                         <input type="text" id="observaciones{{$extra->id}}"
                                                            class="px-2 py-0 my-0 text-center form-control-plaintext input-sm"
                                                            name="observaciones" value="{{$extra->observaciones}}"
                                                            readonly="readonly">
                                                      </td>
                                                      {{-- acciones --}}
                                                      <td class="py-1 my-0">
                                                         @can('presupuesto.edit')
                                                         <a class="editar" title="Editar">
                                                            <i id="editar{{$extra->id}}" class="mx-1 fas fa-edit text-primary fa-2x"></i>
                                                         </a>
                                                         @endcan
                                                         @can('presupuesto.destroy')
                                                         <button type="submit" class="enlace" title="Eliminar">
                                                            <i class="ml-1 far fa-trash-alt text-danger fa-2x"></i>
                                                         </button>
                                                         @endcan
                                                      </td>
                                                   </tr>
                                                </form>
                                             @endforeach
                                          </tbody>
                                          @endif
                                          <tfoot>
                                             <form id="formExtraNew" role="form" method="post" action="{{ route('campaign.presupuesto.extra.store') }}">
                                                <input type="hidden" name="_tokenExtraNew" value="{{ csrf_token()}}" id="tokenExtraNew">
                                                @csrf
                                                <tr class="" id="tExtraNew">
                                                   <input type="hidden" name="presupuesto_id" value="{{$campaignpresupuesto->id}}"">
                                                   <input type="hidden" name="tipo" value="2">
                                                   <td class="px-1 mx-1">
                                                      <input type="text" id="extraNew" name="concepto"
                                                         class="px-1 mx-1 text-left form-control form-control-sm "
                                                         value="">
                                                   </td>
                                                   <td class="px-1 mx-1">
                                                         <select name="zona"
                                                            class="px-1 mx-1 form-control form-control-sm">
                                                            <option value="ES">ES</option>
                                                            <option value="CA">CA</option>
                                                            <option value="PT">PT</option>
                                                         </select>
                                                      </td>
                                                   <td class="px-1 mx-1">
                                                      <input type="text" id="unidadesExtraNew" name="unidades"
                                                         class="px-1 mx-1 text-right form-control form-control-sm"
                                                      onchange="totalizar('ExtraNew')" value="0">
                                                   </td>
                                                   <td class="px-1 mx-1">
                                                      <input type="text" id="preciounidadExtraNew" name="preciounidad"
                                                      class="px-1 mx-1 text-right form-control form-control-sm"
                                                      onchange="totalizar('ExtraNew')" value="0">
                                                   </td>
                                                   <td class="px-1 mx-1">
                                                      <input type="hidden" id="totalExtraNew" name="total"
                                                      class="px-1 mx-1 form-control form-control-sm"
                                                      value="0">
                                                      <span id="totLabelExtraNew" class="pt-1 form-control form-control-sm"></span>
                                                   </td>
                                                   <td class="px-1 mx-1">
                                                      <input type="text" id="observacionesExtraNew" name="observaciones"
                                                      class="px-1 mx-1 text-center form-control form-control-sm"
                                                      value="">
                                                   </td>
                                                   <td class="text-center">
                                                      @can('presupuesto.create')
                                                      <a href="#" title="Validarsss" onclick="document.getElementById('formExtraNew').submit()">
                                                         <i class="mx-1 fas fa-plus text-success fa-2x"></i>
                                                      </a>
                                                      @endcan
                                                   </td>
                                                </tr>
                                             </form>
                                          </tfoot>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <!-- Materiales todos-->
                           <div class="card">
                                 {{-- titulo card --}}
                              <div class="p-0 text-white card-header bg-primary" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="pl-3 card-title">Materiales</h3><span class="ml-3 sumTotMat">
                                    {{number_format($totalMateriales,2,',','.')}}</span>
                                 <div class="pr-3 card-tools">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                                 </div>
                              </div>
                              {{-- tabla presupuesto materiales --}}
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tMaterial" class="table table-hover table-sm small sortable"
                                       cellspacing="0" width=100%>
                                       <thead>
                                          <tr>
                                             <th class="px-2 text-left">Material</th>
                                             <th class="px-2 text-right">Uds x prop</th>
                                             <th class="px-2 text-right">€ ud.</th>
                                             <th class="px-2 text-right">Total</th>
                                             <th class="px-2 text-right"></th>
                                          </tr>
                                       </thead>
                                       @if(count($materiales)>0)
                                       <tbody>
                                          @foreach($materiales as $material)
                                          <tr>
                                             <td class="py-1 my-0 text-left">{{$material->tarifa->familia}}</td>
                                             <td class="py-1 my-0 text-right">{{$material->unidades}}</td>
                                             <td class="py-1 my-0 text-right">{{number_format($material->precio,2,',','.')}}</td>
                                             <td class="py-1 my-0 text-right">{{number_format($material->tot,2,',','.')}}</td>
                                             <td>
                                                <a href="{{route('campaign.presupuesto.elementosfamilia', ['campaignid'=>$campaign->id,'familiaid'=>$material->tarifa,'presupuestoid'=>$campaignpresupuesto->id] ) }}" title="Elementos"><i class="mr-1 far fas fa-cubes text-teal fa-2x"></i></a>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                       @endif
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <a class="btn btn-default" href="{{route('campaign.presupuesto',$campaign->id)}}" title="Ir la página anterior">Volver</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection

@push('scriptchosen')

<script>
   $(document).ready( function () {
      $('#menucampaign').addClass('active');
      $('#navpresupuesto').toggleClass('activo');
   });
</script>

<script>
   @include('_partials._errortemplate')
</script>

<script>
   function totalizar(id) {
      ud=$('#unidades'+id).val();
      precio=parseFloat($('#preciounidad'+id).val().replace(',','.'));
      total=(ud*precio).toFixed(2);
      $('#preciounidad'+id).val(precio);
      $('#total'+id).val(total);
      $('#totLabel'+id).text(total);
   }

   $('.editarTr').dblclick(function(){
      var trid = $(this).closest('tr').attr('id'); // table row ID
      var sumTot='.'+$('#sum'+trid).text();
      checkId='#check'+trid;

      if( $(checkId).prop('checked') ==true) {
         $('#check'+trid).prop('checked',false);
         $('#editar'+trid).removeClass("text-warning").addClass("text-primary")
         $(this).closest('tr').css('background-color','#ffffff');
         actualizar('form'+trid,trid,'/campaign/presupuesto/extra/update/','#tokenMaterial'+trid,sumTot);
         $(this).closest('tr').find('input').attr('readonly',true);
      }
      else{
         $('#check'+trid).prop('checked',true);
         $('#editar'+trid).removeClass("text-primary").addClass("text-warning")
         $(this).closest('tr').css('background-color','#f1e599');
         $(this).closest('tr').find('input').removeAttr('readonly');
      }
   });

   $('.editar').click(function(){
      var trid = $(this).closest('tr').attr('id');
      checkId='#check'+trid;

      if( $(checkId).prop('checked') ==true) {
         $('#check'+trid).prop('checked',false);
         $('#editar'+trid).removeClass("text-warnign").addClass("text-primary")
         $(this).closest('tr').css('background-color','#ffffff');
         $(this).closest('tr').find('input').attr('readonly',true);
      }
      else{
         $('#check'+trid).prop('checked',true);
         $('#editar'+trid).removeClass("text-primary").addClass("text-warning")
         $(this).closest('tr').css('background-color','#f1e599');
         $(this).closest('tr').find('input').removeAttr('readonly');
      }
   });
</script>

<script>
   function actualizar(formulario,materialId,ruta,tok,sumTot) {
   var token = $(tok).val();
   var route = ruta;
   route= ruta+materialId;
   var formElement = document.getElementById(formulario);
   var formData = new FormData(formElement);

   $.ajax({
      cache:false,
      contentType: false,
      processData: false,

      type: "POST",
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      data: formData,
      success: function(data) {
         console.log(data);
         $(sumTot).text(data.totExtra);
         $('#total').val(data.tot);
         toastr.options={
            progressBar:true,
            positionClass:"toast-top-center"
         };
         toastr.info(data.notification);
      },
      error:function(msj){
         console.log(msj.responseJSON.errors);
         toastr.options={
            "closeButton": true,
            "progressBar":true,
            "positionClass":"toast-top-center",
            "options.escapeHtml" : true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
         };
         toastr.error("Ha habido un error. <br />No se ha podido actualizar. <br />"+ msj.responseJSON.message);
      }
   });
}

</script>

@endpush
