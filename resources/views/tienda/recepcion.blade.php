<div class="">
    <div class="flex items-center my-1">
        <div class="w-10/12">
            {{ $campaigns->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
            Hay {{$campaigns->total()}} campañas.
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
    <div class="mx-2">
        <div class="w-full h-3/5">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full px-2">
                        <th class="w-1/12">#</th>
                        <th class="w-4/12">Campaña</th>
                        <th class="w-2/12">Fecha Inicio</th>
                        <th class="w-2/12">Fecha Fin Prevista</th>
                        <th class="w-2/12">Estado</th>
                        <th class="w-1/12">Elementos</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light " style="height: 70vh;">
                    @foreach ($campaigns as $campaign)
                    <tr class="flex items-center w-full px-2 hover:bg-blue-50">
                        <td class="w-1/12">{{$campaign->id}}</td>
                        <td class="w-4/12">{{$campaign->campaign_name}}</td>
                        <td class="w-2/12 pl-2">{{$campaign->campaign_initdate}}</td>
                        <td class="w-2/12 pl-3">{{$campaign->campaign_enddate}}</td>
                        <td class="w-2/12 pl-3">{{$campaign->campaign_state}}</td>
                        <td class="w-1/12 text-center">
                            @can('tiendas.edit')
                                <x-icon.cubes-a class="text-teal-700" href="{{route('tienda.editrecepcion', [$campaign,$store->id] ) }}" title="Estado recepción">Recepción</x-icon.cubes-a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush

