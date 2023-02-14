<div class="h-full p-1 ">
    <div class="text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="flex items-center w-full p-1">
            <div class="flex w-6/12">
                <x-jet-label class="mx-2 mt-1" for="campaign_name">Campaña </x-jet-label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_name }}" disabled />
            </div>
            <div class="flex w-3/12 pl-2">
                <x-jet-label for="campaign_initdate">Fecha Inicio </x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_initdate }}"disabled />
            </div>
            <div class="flex w-3/12 pl-2">
                <x-jet-label for="campaign_enddate">Fecha Finalización </x-jet-label>
                <input type="date" class="w-full py-1 bg-gray-100 rounded-md" value="{{ $campaign->campaign_enddate }}" disabled />
            </div>
        </div>
    </div>
    <div class="">
        @include('errores')
    </div>
    <div class="">
        <div class="w-full mt-2">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black rounded-t-md">
                    <tr class="flex w-full">
                        <th class="w-1/12 pl-2">#</th>
                        <th class="w-2/12">Material</th>
                        <th class="w-2/12">Medida</th>
                        <th class="w-2/12">Id tarifa</th>
                        <th class="w-2/12">Tarifa Antigua</th>
                        <th class="w-2/12">Tarifa Nueva</th>
                        <th class="w-1/12 "></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 65vh;">
                    @foreach($elementos as $elemento)
                    <form id="form{{$elemento->id}}" role="form" method="post" action="{{ route('campaign.presupuesto.updateelemento') }}" >
                        @method('PUT')
                        @csrf
                        <tr class="flex items-center w-full">
                            <input type="hidden" name="elemento_id" value="{{$elemento->elemento_id}}" >
                            <td class="w-1/12 pl-2">{{$elemento->elemento_id}}</td>
                            <td class="w-2/12">{{$elemento->material}}</td>
                            <td class="w-2/12">{{$elemento->medida}}</td>
                            <td class="w-2/12">{{$elemento->familia}}</td>
                            <td class="w-2/12">{{$elemento->tarifa->familia}}</td>
                            <td class="w-2/12">
                                <x-select selectname="familia" class="w-full py-1 text-base border-blue-300" id="familia" onchange="update('form{{$elemento->id}}',{{$elemento->id}})">
                                    <option value="">--nueva tarifa--</option>
                                    @foreach($tarifas as $tarifa)
                                    <option value="{{$tarifa->id}}" {{ $tarifa->id== $elemento->tarifa->familia ? 'selected' :'' }} >{{$tarifa->familia}}</option>
                                    @endforeach
                                </x-select>
                            </td>
                            <td class="w-1/12 text-center">
                                <button type="submit"><x-icon.save class="w-6 text-blue-600"/></button>
                            </td>
                        </tr>
                    </form>
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
