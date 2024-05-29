<div class="">
    <div class="flex items-center my-1">
        <div class="w-10/12">
            {{ $campaigns->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
        </div>
        <div class="w-2/12">
            <form method="GET" action="{{route('tienda.index') }}">
                <div class="mr-2">
                    <x-input.text id="busca" name="busca"  type="search" name="search" value='{{$busqueda}}' placeholder="búsqueda"
                    class="flex-1 block w-full p-1 transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"/>
                </div>
            </form>
        </div>
    </div>
    <div class="mx-2 mt-2 space-y-2 border rounded-md">
        <div class="flex w-full pt-2 text-lg font-bold text-gray-500 bg-blue-100 rounded-t-md">
            <div class="w-full pl-2 ">Campaña</div>
        </div>
        @foreach ($campaigns as $campaign)
            @can('tiendas.edit')
            <div onclick="location.href = '{{ route('tienda.editrecepcion', [$campaign,$store->id] ) }}'" class="flex w-full text-lg text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
            @else
            <div class="flex w-full text-lg text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
            @endcan
                <div class="w-full pl-2 text-left ">{{$campaign->campaign_name}}</div>
            </div>
        @endforeach
    </div>
    {{-- <div class="mx-2 mt-2 border rounded-md">
        <div class="flex w-full pt-2 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
            <div class="w-3/12 pl-2 ">Campaña</div>
            <div class="flex-none w-2/12 lg:flex ">
                <div class="w-full text-center lg:w-6/12">F.Inicio</div>
                <div class="w-full text-center lg:w-6/12">F.Fin</div>
                <div class="w-full text-center lg:w-6/12">F.Tienda</div>
            </div>
            <div class="flex-none w-4/12 lg:flex ">
                <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 1">F.Mon.1</div>
                <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 2">F.Mon.2</div>
                <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 2">F.Mon.3</div>
            </div>
            <div class="w-3/12 text-center">Estado Campaña</div>
        </div>
        @foreach ($campaigns as $campaign)
            @can('tiendas.edit')
            <div onclick="location.href = '{{ route('tienda.editrecepcion', [$campaign,$store->id] ) }}'" class="flex w-full text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
            @else
            <div class="flex w-full text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
            @endcan
                <div class="w-3/12 pl-2 text-left ">{{$campaign->campaign_name}}</div>
                <div class="flex-none w-2/12 lg:flex ">
                    <div class="w-full text-center text-blue-500 lg:w-4/12">{{$campaign->campaign_initdate}}</div>
                    <div class="w-full text-center text-green-500 lg:w-4/12">{{$campaign->campaign_enddate}}</div>
                    <div class="w-full text-center text-orange-500 lg:w-4/12">{{$campaign->fechaentregatienda}}</div>
                </div>
                <div class="flex-none w-4/12 text-center lg:flex ">
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal1}}</div>
                        <div class="text-center ">{{ $campaign->montaje1  }}</div>
                    </div>
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal2}}</div>
                        <div class="text-center ">{{ $campaign->montaje2  }}</div>
                    </div>
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal3}}</div>
                        <div class="text-center ">{{ $campaign->montaje3  }}</div>
                    </div>
                </div>
                <div class="w-3/12 text-center ">{{ $campaign->campaign->state['1'] }}</div>
            </div>
        @endforeach
    </div> --}}
</div>


@push('scriptchosen')

<script>

</script>

@endpush

