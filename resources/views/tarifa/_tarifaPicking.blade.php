<div class="card ">
   <div class="card-header text-white bg-primary p-1" data-card-widget="collapse" style="cursor: pointer">
      <h3 class="card-title pl-3">Tarifas Picking</h3>
      <div class="card-tools pr-3">
         <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
      </div>
   </div>
   <div class="card-body">
      {{-- links  y cuadro busqueda --}}
      <div class="row">
         <div class="col-7 row">
            {{ $tarifasPicking->appends(request()->except('page'))->links() }}
         </div>
         <div class="col-5 float-right mb-2"> 
         </div>
      </div>

      <div class="table-responsive">
         <table id="tTarifas" class="table table-hover table-sm small sortable" cellspacing="0" width=100%>
            <thead>
               <tr>
                  <th>Ámbito</th>
                  <th class="bg-light text-center">Tarifa</th>
                  <th class="text-center"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($tarifasPicking as $tarifaPicking)
               <tr>
                  <td>{{$tarifaPicking->zona}}</td>
                  <td class="bg-light text-center">{{$tarifaPicking->tarifa1}} €</td>
                  <td>
                     @can('tarifa.edit')
                     @endcan
                     <a href="{{ route('tarifa.edit',$tarifaPicking->id) }}" title="Edit">
                        <i class="far fa-edit text-primary fa-2x mx-1"></i>
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>