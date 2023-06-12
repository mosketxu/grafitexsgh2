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
        <div class="mx-2 space-y-1 border rounded-md">
            {{ $maestros->appends(request()->except('page'))->links() }}

            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-1/12 text-left">Store</div>
                <div class="w-1/12 text-left">Name</div>
                <div class="w-1/12 text-left">Country</div>
                <div class="w-1/12 text-left">Area</div>
                <div class="w-1/12 text-left">Segmento</div>
                <div class="w-1/12 text-left">Channel</div>
                <div class="w-1/12 text-left">Cluster</div>
                <div class="w-1/12 text-left">Storeconcept</div>
                <div class="w-1/12 text-left">Furniture Type</div>
                <div class="w-1/12 text-left">Ubicacion</div>
                <div class="w-1/12 text-left">Mobiliario</div>
                <div class="w-1/12 text-left">Propxelemento</div>
                <div class="w-1/12 text-left">Carteleria</div>
                <div class="w-1/12 text-left">Medida</div>
                <div class="w-1/12 text-left">Material</div>
                <div class="w-1/12 text-left">Unitxprop</div>
                <div class="w-1/12 text-left">Obs.</div>
            </div>
            @foreach ($maestros as $maestro)
            <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y " wire:loading.class.delay="opacity-50">
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->store}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->name}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->country}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->area}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->segmento}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->channel}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->store_cluster}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->storeconcept}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->furniture_type}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->ubicacion}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->mobiliario}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->propxmaestro}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->carteleria}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->medida}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->material}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->unitxprop}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$maestro->observaciones}}</div>
            </div>
            @endforeach
            {{-- <div class="mt-2 ml-2">
                {{$maestros->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
            </div> --}}
        </div>
    </div>
</div>
@push('scriptchosen')
<script>
    function borrarFiltros(){
        alert('sdf');
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

