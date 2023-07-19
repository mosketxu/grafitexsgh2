<div class="">
    <div class="flex p-1 mx-2">
        <div class="w-11/12">
            @include('campaign.campaigncabecera')
        </div>
        <div class="w-1/12 text-center">
            <div class="text-center">
                <label for="xls">Hay {{$stores->total()}} stores. </label>
            </div>
            <div class="mx-auto text-center">
                <x-icon.xls-a id="xls" href="{{route('campaign.exportaddresses',$campaign->id)}}" class="w-6 text-green-700" title="Exporta Excel"/>
            </div>
        </div>
    </div>
        <div class="w-full h-full px-4">
            <div class="py-1 my-0 ">
                {{ $stores->appends(request()->except('page'))->links() }}
            </div>
            <table class="w-full px-1 text-xs text-left rounded-md">
                <thead class="flex flex-col w-full text-white bg-black rounded-t-md ">
                    <tr class="flex w-full">
                        <th class="w-1/12 ml-2">Luxottica</th>
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
                    @if(Auth::user()->can('stores.edit'))
                    <tr class="flex w-full border border-b-1 hover:bg-gray-300" onclick="location.href = '{{ route('stores.edit', $store) }}'">
                    @else
                    <tr class="flex w-full border border-b-1 hover:bg-gray-300" >
                    @endif
                        <td class="w-1/12 ml-2">{{$store->luxotica}}</td>
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

