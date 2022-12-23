<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('elementos.elementosfilters')
        </div>
    </div>
    <div class="pb-0 mx-2 space-y-1 border rounded-md">
        {{-- Datos elementos --}}
        <div class="">
            {{-- titulos --}}
            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-t-md ">
                <div class="w-1/12">#</div>
                {{-- <div class="w-1/12">Code</div> --}}
                <div class="w-1/12">Ubicación</div>
                <div class="w-2/12">Mobiliario</div>
                <div class="w-2/12">Prop x Elemento</div>
                <div class="w-2/12">Carteleria</div>
                <div class="w-1/12">Medida</div>
                <div class="w-1/12">Material</div>
                <div class="w-1/12 text-center">Unit x Prop</div>
                <div class="w-2/12">Observaciones</div>
                <div class="w-1/12"></div>
            </div>
            {{-- lista elementos --}}
            @foreach ($elementos as $elemento)
                <div class="flex w-full py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1">
                    <div class="w-1/12">{{$elemento->id}}</div>
                    {{-- <div class="w-1/12 break-words">{{$elemento->elementificador}}</div> --}}
                    <div class="w-1/12">{{$elemento->ubicacion}}</div>
                    <div class="w-2/12">{{$elemento->mobiliario}}</div>
                    <div class="w-2/12">{{$elemento->propxelemento}}</div>
                    <div class="w-2/12">{{$elemento->carteleria}}</div>
                    <div class="w-1/12">{{$elemento->medida}}</div>
                    <div class="w-1/12">{{$elemento->material}}</div>
                    <div class="w-1/12 text-center">{{$elemento->unitxprop}}</div>
                    <div class="w-2/12">{{$elemento->observaciones}}</div>
                    <div  class="flex w-1/12">
                        @can('elemento.edit')
                        <div class="">
                            <a href="{{route('elemento.edit',$elemento->id)}}" title="Editar"><x-icon.edit class="text-blue-600"></x-icon.edit></a>
                        </div>
                        @endcan
                        @can('elemento.delete')
                        <div class="">
                            @livewire('elementos.elemento-eliminar',['elemento'=>$elemento],key($elemento->id))
                        </div>
                        @endcan
                    </div>
                </div>
            @endforeach
            <div class="py-0 ml-2">
            {{ $elementos->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')


<script>
    new TomSelect('#ubi', {maxItems: 10,});
    new TomSelect('#mobi', {maxItems: 10,});
    new TomSelect('#prop', {maxItems: 10,});
    new TomSelect('#car', {maxItems: 10,});
    new TomSelect('#med', {maxItems: 10,});
    new TomSelect('#mat', {maxItems: 10,});

</script>

@endpush

