<div class="">
    <div class="">
        @include('errores')
    </div>
    <div class="p-1 mx-2">
        <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex-none w-full p-1 bg-gray-100 rounded-md md:flex md:space-x-2">
                <div class="w-full rounded-md md:w-5/12">
                    <div class="">
                        <label for="campaign_name">Campaña</label>
                        <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                            name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                            disabled />
                    </div>
                    <div class="flex space-x-2">
                        <div class="w-4/12">
                            <label for="campaign_initdate">F.Ini.Prod.</label>
                            <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                                name="campaign_initdate"
                                value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                                disabled />
                        </div>
                        <div class="w-4/12">
                            <label for="campaign_enddate">F.Fin.Prod.</label>
                            <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                                name="campaign_enddate"
                                value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                                disabled />
                        </div>
                        <div class="w-4/12">
                            <label for="fechaentregatienda">F.Tienda</label>
                            <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="fechaentregatienda"
                                name="fechaentregatienda"
                                value="{{ old('fechaentregatienda',$campaign->fechaentregatienda) }}"
                                disabled />
                        </div>
                    </div>
                </div>
                @can('plan.edit')
                    @include('campaign.plan.fechasactualiza')
                @else
                    @include('campaign.plan.fechasmuestra')
                @endif
                <div class="flex-none w-full md:flex md:w-3/12">
                    <div class="w-full my-auto space-y-2">
                    <div class="w-full my-2 text-xs font-semibold tracking-widest text-center text-white uppercase bg-gray-400 border border-transparent rounded-md ">
                        {{ __('Filtros') }}
                    </div>
                        <form method="GET" action="{{route('plan.index',$campaign) }}">
                            <input id="buscaname" name="buscaname" type="search" value='{{$busquedaname}}' placeholder="Buscar por nombre..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                        <form method="GET" action="{{route('plan.index',$campaign) }}">
                            <input id="buscastoreid" name="buscastoreid" type="search" value='{{$busquedastoreid}}' placeholder="Buscar por store code..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full px-2">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black rounded-t-md">
                    <tr class="flex w-full mx-2">
                        <th class="w-1/12">Store</th>
                        <th class="w-1/12">Name</th>
                        <th class="w-1/12">Country</th>
                        <th class="w-1/12">Area</th>
                        <th class="w-1/12">Provincia</th>
                        <th class="w-1/12">Ciudad</th>
                        <th class="w-1/12">
                            @can('entidad.index')
                                Montador
                            @endcan
                        </th>
                        <th class="w-1/12">F.Prev 1</th>
                        <th class="w-1/12">F.Prev 2</th>
                        <th class="w-1/12">F.Prev 3</th>
                        <th class="w-1/12">F.Real 1</th>
                        <th class="w-1/12">F.Real 2</th>
                        <th class="w-1/12">F.Real 3</th>
                        <th class="w-1/12">Obs.Montaje</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($campaigntiendas as $camptienda)
                    <tr class="flex w-full py-1 mx-2 hover:bg-gray-100 hover:cursor-pointer" onclick="location.href = '{{ route('plan.edit',$camptienda) }}'" color="gray" >
                        <td class="w-1/12">{{$camptienda->store_id}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->name}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->country}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->area}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->province}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->city}}</td>
                        <td  class="w-1/12">
                            @can('entidad.index')
                                @if($camptienda->montador_id)
                                    <a href="{{ route('entidad.show',$camptienda->montador_id) }}" class="text-blue-600 underline">{{$camptienda->montador->entidad}}</a>
                                @endif
                            @endcan
                        </td>
                        <td class="w-1/12">{{$camptienda->fechaprev1}} {{ $camptienda->montaje1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechaprev2}} {{ $camptienda->montaje2 }}</td>
                        <td class="w-1/12">{{$camptienda->fechaprev3}} {{ $camptienda->montaje3 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador1}}  {{ $camptienda->montaje1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador2}}  {{ $camptienda->montaje2 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador3}}  {{ $camptienda->montaje3 }}</td>
                        <td class="w-1/12">{{$camptienda->observacionesmontador}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-2 ">
                {{ $campaigntiendas->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush
