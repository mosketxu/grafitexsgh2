<div class="">
    <div class="p-1 mx-2">
        <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 space-x-2 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <div class="">
                        <label for="campaign_name">Campaña</label>
                        <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                            name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                            disabled />
                    </div>
                    <div class="flex">
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
                <form action="{{ route('campaign.planupdate',$campaign) }}"  method="post" class="w-3/12">
                    @csrf
                    @method('PUT')
                    <div class="flex space-x-2">
                        <div class="w-8/12">
                            <div class="w-full">
                                <label for="fechainstalini">F.Ini.Montaje Prev.</label>
                                <input type="date" class="w-full text-sm py-1 {{ $color }} rounded-md form-control form-control-sm" id="fechainstalini"
                                name="fechainstalini"
                                value="{{ old('fechainstalini',$campaign->fechainstalini) }}"/>
                            </div>
                            <div class="w-full">
                                <label for="fechainstalfin">F.Fin Montaje Prev.</label>
                                <input type="date" class="w-full text-sm py-1 {{ $color }} rounded-md form-control form-control-sm" id="fechainstalfin"
                                name="fechainstalfin"
                                value="{{ old('fechainstalfin',$campaign->fechainstalfin) }}"/>
                            </div>
                        </div>
                        <div class="w-4/12 my-auto">
                            <x-jet-button type="submit"
                                class="w-full py-1.5 bg-blue-600 border-blue-900 hover:bg-blue-800"  >{{ __('Guardar Fechas') }}</x-jet-button>
                        </div>
                    </div>
                </form>
                <div class="flex w-3/12 space-x-2">
                    <div class="w-8/12 my-auto space-y-2">
                        <form method="GET" action="{{route('campaign.plan',$campaign) }}">
                            <input id="buscaname" name="buscaname" type="search" value='{{$busquedaname}}' placeholder="Buscar por nombre..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                        <form method="GET" action="{{route('campaign.plan',$campaign) }}">
                            <input id="buscastoreid" name="buscastoreid" type="search" value='{{$busquedastoreid}}' placeholder="Buscar por store code..."
                            class="w-full py-1 text-sm transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                        </form>
                    </div>
                    <div class="w-4/12 my-auto">
                        <x-jet-button type="button"
                            class="w-full py-1.5 bg-green-600 border-blue-900 hover:bg-blue-800" onclick="location.href = '{{ route('campaign.generarplan',$campaign) }}'"  >{{ __('Generar Plan') }}</x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        @include('errores')
    </div>
    <div class="">
        <div class="w-full px-2">
            <div class="m-2">
                {{ $campaigntiendas->appends(request()->except('page'))->links() }}
            </div>
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
                        <th class="w-1/12">F.Ini prev</th>
                        <th class="w-1/12">F.fin prev</th>
                        <th class="w-1/12">F.Ini Real</th>
                        <th class="w-1/12">F.Fin Real</th>
                        <th class="w-1/12">Obs.Montaje</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($campaigntiendas as $camptienda)
                    <tr class="flex w-full mx-2">
                        {{-- {{ $camptienda }} --}}
                        <td class="w-1/12">{{$camptienda->store_id}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->name}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->country}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->area}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->province}}</td>
                        <td class="w-1/12">{{$camptienda->tienda->city}}</td>
                        <td  class="w-1/12">
                            @can('entidad.index')
                                @if($camptienda->proveedor_id)
                                    <a href="{{ route('entidad.show',$camptienda->proveedor_id) }}" class="text-blue-600 underline">{{$camptienda->montador->entidad}}</a>
                                @endif
                            @endcan
                        </td>
                        <td class="w-1/12">{{$camptienda->fechainiprev}}</td>
                        <td class="w-1/12">{{$camptienda->fechafinprev}}</td>
                        <td class="w-1/12">{{$camptienda->fechainimontador}}</td>
                        <td class="w-1/12">{{$camptienda->fechafinmontador}}</td>
                        <td class="w-1/12">{{$camptienda->observacionesmontador}}</td>
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
