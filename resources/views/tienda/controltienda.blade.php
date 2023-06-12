<div class="">
    <div class="p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
    <div class="mx-2">
        <div class="flex items-center w-full py-1 pl-2 space-x-2">
            {{ $stores->appends(request()->except('page'))->links() }}
        </div>
        <div class="w-full h-3/5">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full px-2">
                        {{-- <th class="w-1/12">Luxottica</th> --}}
                        <th class="w-1/12">Country</th>
                        <th class="w-1/12">Store</th>
                        <th class="w-2/12">Nombre</th>
                        <th class="w-3/12">eMail</th>
                        <th class="w-1/12 text-right">Total</th>
                        <th class="flex flex-row-reverse w-1/12"><x-icon.question class="w-2 mb-1 text-white"/></th>
                        <th class="flex flex-row-reverse w-1/12"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/></th>
                        <th class="flex flex-row-reverse w-1/12"><x-icon.thumbs-down class="w-4 mb-1 text-red-500"/></th>
                        <th class="w-1/12"></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 70vh;">
                    @foreach ($stores as $store)
                    <tr class="flex w-full px-2">
                        <input type="hidden" name="id" value="{{$store->id}}">
                        <td class="w-1/12">{{$store->tienda->luxotica}}</td>
                        <td class="w-1/12">{{$store->tienda->id}}</td>
                        <td class="w-2/12">{{$store->tienda->name}}</td>
                        <td class="w-3/12"><a href="mailto:{{$store->tienda->email}}"><span class="text-blue-500 underline">{{$store->tienda->email}}</span>  </a></td>
                        <td class="w-1/12 text-right">{{$store->elementos_count}}</td>
                        <td class="w-1/12 pr-2 text-right">{{$store->elementos_count-$store->elementosok_count-$store->elementosko_count}}</td>
                        <td class="w-1/12 pr-2 text-right">{{$store->elementosok_count}}</td>
                        <td class="w-1/12 pr-2 text-right">{{$store->elementosko_count}}</td>
                        <td class="flex flex-row-reverse w-1/12 pr-2">
                            @can('tiendas.index')
                                <a href="{{ route('tienda.show',[$campaign,$store->tienda->id]) }}" title="Editar tienda"><x-icon.arrow-right class="text-green-500"/></a>
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

