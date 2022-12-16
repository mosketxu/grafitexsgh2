<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('maestro.maestrofilters')
        </div>
        {{-- main content  --}}
        <div class="flex-col space-y-4">
            <div class="">
                <table class="ml-2 text-xs tracking-tighter table-auto" width=100%>
                    <thead>
                        <tr>
                            <th class="text-left">Store</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Country</th>
                            <th class="text-left">Area</th>
                            <th class="text-left">Segmento</th>
                            <th class="text-left">Channel</th>
                            <th class="text-left">Cluster</th>
                            <th class="text-left">Storeconcept</th>
                            <th class="text-left">Furniture Type</th>
                            <th class="text-left">Ubicacion</th>
                            <th class="text-left">Mobiliario</th>
                            <th class="text-left">Propxelemento</th>
                            <th class="text-left">Carteleria</th>
                            <th class="text-left">Medida</th>
                            <th class="text-left">Material</th>
                            <th class="text-left">Unitxprop</th>
                            <th class="text-left">Obs.</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($maestros as $maestro)
                        <tr class="border-b border-1">
                            <td>{{$maestro->store}}</td>
                            <td>{{$maestro->name}}</td>
                            <td>{{$maestro->country}}</td>
                            <td>{{$maestro->area}}</td>
                            <td>{{$maestro->segmento}}</td>
                            <td>{{$maestro->channel}}</td>
                            <td>{{$maestro->store_cluster}}</td>
                            <td>{{$maestro->storeconcept}}</td>
                            <td>{{$maestro->furniture_type}}</td>
                            <td>{{$maestro->ubicacion}}</td>
                            <td>{{$maestro->mobiliario}}</td>
                            <td>{{$maestro->propxmaestro}}</td>
                            <td>{{$maestro->carteleria}}</td>
                            <td>{{$maestro->medida}}</td>
                            <td>{{$maestro->material}}</td>
                            <td>{{$maestro->unitxprop}}</td>
                            <td>{{$maestro->observaciones}}</td>
                        </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 ml-2">
                    {{$maestros->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                </div>
            </div>
        </div>
    </div>
</div>
@push('scriptchosen')
<script>
    function borrarFiltros(){
        $("#sto").val('');
        $("#nam").val('');
        $("#coun").val('');
        $("#are").val('');
        $("#seg").val('');
        $("#conce").val('');
        $("#ubi").val('');
        $("#mob").val('');
        $("#propx").val('');
        $("#cart").val('');
        $("#med").val('');
        $("#mat").val('');
    }
</script>
@endpush

