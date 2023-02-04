<div class="">
    <div class="p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md " id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-2/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md " id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-2/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md " id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
                <div class="w-2/12 text-center">
                    <div class="text-center">
                        <label for="xls">Hay {{$stores->total()}} stores. </label>
                    </div>
                    <div class="text-center mx-auto">
                        <x-icon.xls-a id="xls" href="{{route('campaign.exportaddresses',$campaign->id)}}" class="text-green-700 w-6" title="Exporta Excel"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="w-full h-full px-4">
            <div class="py-1 my-0 ">
                {{ $stores->appends(request()->except('page'))->links() }}
            </div>
            <table class="w-full text-xs text-left px-1 rounded-md">
                <thead class="flex flex-col w-full text-white bg-black rounded-t-md ">
                    <tr class="flex w-full">
                        <th class="w-1/12">Luxotica</th>
                        <th class="w-1/12">Store</th>
                        <th class="w-2/12">Address</th>
                        <th class="w-2/12">City-CP-Province</th>
                        <th class="w-1/12">Phone</th>
                        <th class="w-2/12">email</th>
                        <th class="w-1/12">Winter schedule/ <br> Summer schedule <br> Delivery Time</th>
                        <th class="w-2/12">Observaciones</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($stores as $store)
                    <tr class="flex w-full border border-b-1">
                        <td class="w-1/12">{{$store->luxotica}}</td>
                        <td class="w-1/12">{{$store->id}} {{$store->name}}</td>
                        <td class="w-2/12">{{$store->address}}</td>
                        <td class="w-2/12">{{$store->city}} {{$store->cp!='' ? '- '.$store->cp : ''}} {{$store->province!='' ? '- '.$store->province : '' }}</td>
                        <td class="w-1/12">{{$store->phone}}</td>
                        <td class="w-2/12">{{$store->email}}</td>
                        <td class="w-1/12">{{$store->winterschedule}} <br>{{$store->summerschedule}} <br>{{$store->deliverytime}}</td>
                        <td class="w-2/12">{{$store->observaciones}}</td>
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

