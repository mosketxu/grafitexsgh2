<div class="">
    <div class="">
        @include('errores')
    </div>
    <div class="p-1 mx-2">
        <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 space-x-2 bg-gray-100 rounded-md">
                <div class="w-5/12 rounded-md">
                    <div class="">
                        <label for="campaign_name">Campaña</label>
                        <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                            name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                            disabled />
                    </div>
                    <div class="flex space-x-2">
                        <div class="w-6/12">
                            <label for="campaign_initdate">F.Ini.Prod.</label>
                            <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                                name="campaign_initdate"
                                value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                                disabled />
                        </div>
                        <div class="w-6/12">
                            <label for="campaign_enddate">F.Fin.Prod.</label>
                            <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                                name="campaign_enddate"
                                value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                                disabled />
                        </div>
                    </div>
                </div>
                <form action="{{ route('plan.updatefechas',$campaign) }}"  method="post" class="w-4/12">
                    @csrf
                    @method('PUT')
                    <div class="flex space-x-2">
                        <div class="w-7/12">
                            <div class="w-full">
                                <label for="fechainstal1">Fecha de {{ $monta_desmonta }}</label>
                                <input type="date" class="w-full text-sm py-1 {{ $color }} rounded-md form-control form-control-sm" id="fechainstal1"
                                name="fechainstal1"
                                value="{{ old('fechainstal1',$campaign->fechainstal1) }}"/>
                            </div>
                            <div class="w-full">
                                <label for="fechainstal2">Fecha de {{ $monta_desmonta2 }}</label>
                                <input type="date" class="w-full text-sm py-1 {{ $color }} rounded-md form-control form-control-sm" id="fechainstal2"
                                name="fechainstal2"
                                value="{{ old('fechainstal2',$campaign->fechainstal2) }}"/>
                            </div>
                            <div class="w-full">
                                <label for="fechainstal3">Fecha de {{ $monta_desmonta3 }}</label>
                                <input type="date" class="w-full text-sm py-1 {{ $color }} rounded-md form-control form-control-sm" id="fechainstal3"
                                name="fechainstal3"
                                value="{{ old('fechainstal3',$campaign->fechainstal3) }}"/>
                            </div>
                        </div>
                        <div class="w-5/12 ">
                            <x-jet-button type="submit"
                                class="w-full py-1.5 bg-blue-600 border-blue-900 hover:bg-blue-800"  >{{ __('Generar Plan') }}</x-jet-button>
                            <label for="fechainstalini">Paso 2</label>
                            <x-jet-button type="button"
                                class="w-full py-1.5 bg-green-600 border-blue-900 hover:bg-blue-800" onclick="location.href = '{{ route('plan.generar',$campaign) }}'"  >{{ __('Generar Plan') }}</x-jet-button>
                                </div>
                    </div>
                </form>
                <div class="flex flex-row-reverse w-3/12 space-x-2">
                    <div class="w-full my-auto space-y-2">
                        <form method="GET" action="{{route('plan.index',$campaign) }}">
                            <input id="buscaname" name="buscaname" type="search" value='{{$busquedaname}}' placeholder="Buscar por nombre..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                        <form method="GET" action="{{route('plan.index',$campaign) }}">
                            <input id="buscastoreid" name="buscastoreid" type="search" value='{{$busquedastoreid}}' placeholder="Buscar por store code..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                    </div>
                    <div class="w-4/12 my-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-full px-2">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
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
                    <tr class="flex w-full py-1 mx-2 hover:bg-gray-100 hover:cursor-pointer" onclick="location.href = '{{ route('plam.tiendaedit',$camptienda) }}'" color="gray" >
                        {{-- {{ $camptienda }} --}}
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
                        <td class="w-1/12">{{$camptienda->fechaprev1}} {{ $camptienda->monta_desmonta1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechaprev2}} {{ $camptienda->monta_desmonta1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechaprev3}} {{ $camptienda->monta_desmonta1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador1}}  {{ $camptienda->monta_desmonta1 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador2}}  {{ $camptienda->monta_desmonta2 }}</td>
                        <td class="w-1/12">{{$camptienda->fechamontador3}}  {{ $camptienda->monta_desmonta3 }}</td>
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
